<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;

class DishController extends Controller
{
	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
		// pries tai reikia dar ideti i app/Http/Kernel.php faila i gala i $routeMiddleware:
		// 'admin' => \App\Http\Middleware\Admin::class,
		// - kelia iki klases, su tokiu pavadinimu kaip iskvieciam
	}

	public function index()
	{
		$dishes = Dish::all();
		return view('dishes', [
			'dishes' => $dishes,
		]);
	}

	public function show(Request $request) {
		$dish = Dish::findOrFail($request->id);
		return view('dish/show', [
			'dish' => $dish,
		]);
	}

	public function create() {
		return view('dish/create');
	}

	private function validation(Request $request) {
		$request->validate([
			'title' 				=> 'required|max:300',
			'price' 				=> 'required|numeric|min:0|max:100',
			'description' 	=> 'required|max:1000',
			'image_url' 		=> 'required|max:1000',
		], [
			'title.required' 				=> 'Antrastes laukelis yra privalomas',
			'price.required' 				=> 'Kainos laukelis yra privalomas',
			'description.required' 	=> 'Aprasymo laukelis yra privalomas',
			'image_url.required' 		=> 'Nuotrauka yra privaloma',
		]);
	}

	public function store(Request $request) {
		$this->validation($request);
		$dish = new Dish();
		$dish->title = $request->title;
		$dish->price = $request->price;
		$dish->description = $request->description;
		$dish->image_url = $request->category;
		$dish->save();
		return redirect()->route('dishes.show', $dish->id);
	}

	public function edit(Request $request) {
		$dish = Dish::find($request->id);
		return view('dish/edit', [
			'dish' => $dish
		]);
	}

	public function update(Request $request) {
		// echo 'update';
		$this->validation($request);
		$dish = Dish::find($request->id);
		$dish->title = $request->title;
		$dish->price = $request->price;
		$dish->image_url = $request->image_url;
		$dish->description = $request->description;
		$dish->save();
		return redirect()->route('products.show', $dish->id);
	}

	public function destroy(Request $request) {
		$dish = Dish::find($request->id);
		// $dish = Dish::find($request->id); // - jeigu reikia viena elementa pasirinkti
		$dish->delete();
		return redirect()->route('dishes');
	}
}
