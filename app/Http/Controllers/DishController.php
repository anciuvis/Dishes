<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
	public function index()
	{
		$dishes = Dish::all();
		return view('dishes', [ 'dishes' => $dishes ]);
	}

	public function show(Request $request) {
		$dish = Dish::findOrFail($request->id);
		return view('dish/show', ['dish' => $dish]);
	}

	public function create() {
		return view('product/create');

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
			'product'				=> $product
		]);
	}

	public function update(Request $request) {
		// echo 'update';
		$this->validation($request);
		$product = Product::find($request->id);
		$product->title = $request->title;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->description = $request->description;
		$product->category = $request->category;
		$product->manufacturer = $request->manufacturer;
		$product->save();
		return redirect()->route('products.show', $product->id);
	}

	public function destroy(Request $request) {
		$dish = Product::find($request->id)->get();
		// $dish = Product::find($request->id)->first(); - jeigu reikia viena elementa pasirinkti
		$dish->delete();
		return redirect()->route('dishes');
	}
}
