<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Dish;

class DishController extends Controller
{
	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
		// pries tai reikia dar nurodyti i app/Http/Kernel.php faila i gala i $routeMiddleware:
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
			'description' 	=> 'required|max:3000',
			'image_url' 		=> 'required|mimes:jpeg,bmp,png|max:500',
		], [
			'title.required' 				=> 'Antrastes laukelis yra privalomas',
			'price.required' 				=> 'Kainos laukelis yra privalomas',
			'description.required' 	=> 'Aprasymo laukelis yra privalomas',
			'image_url.required' 		=> 'Nuotrauka yra privaloma',
		]);
	}

	public function store(Request $request) {
		$this->validation($request);
		// i storage/app ikelia default, tolimesni kelia rnurodome
		$path = $request->file('image_url')->store('public/dishes');
		// public/dishes/*****
		// reikia dar php artisan storage:link irasti, dirbant su storagu - sukuria SYMLINKa
		$path = str_replace('public', '/storage', $path);
		// storage/dishes/****
		// dd($path);
		// $request->image_url = $path;
		// Dish::create(\Input::all());
		// // - vietoj to kad atskirai viska aprasineti:
		$dish = new Dish();
		$dish->title = $request->title;
		$dish->price = $request->price;
		$dish->description = $request->description;
		$dish->image_url = $path;
		// $request->image_url pakeisti i $path kad butu failo ikelimas i duombaze
		$dish->save();
		return redirect()->route('dishes');
	}

	public function edit(Request $request) {
		$dish = Dish::find($request->id);
		return view('dish/edit', [
			'dish' => $dish
		]);
	}

	public function imageDelete($url) {
		$oldPath = str_replace('storage', '/public', $url);
		Storage::delete($oldPath);
	}

	public function download(Dish $dish) {
		$path = str_replace('storage', 'public', $dish->image_url);
		// dd($path);
		// return Storage::download($path);

		// nuotrauku atidarymui (o ne parsisiuntimui)
		$booleanPng = strpos($path, '.png');
		$booleanJpeg = strpos($path, '.jpeg');
		$booleanJpg = strpos($path, '.jpg');
		$type = '';
		if ($booleanPng) {
			$type = 'image/png';
		} elseif ($booleanJpeg || $booleanJpg) {
			$type = 'image/jpeg';
		}
		return response(Storage::get($path))->header('Content-Type', $type);
		// Storage::download('dishes/info.csv');

	}


	public function update(Request $request, Dish $dish) {
		// echo 'update';
		$dish = Dish::find($request->id);
		$rules = [
			'title'  => 'required|min:3',
			'description' => 'required',
			'price' => 'required|numeric',
		];
		if ($request->file('image_url')) {

			$rules['image_url'] = 'mimes:jpeg,bmp,png|max:500';

			$this->validate($request, $rules);

			$this->imageDelete($dish->image_url);

			$path = $request->file('image_url')->store('public/dishes');
			$path = str_replace('public', '/storage', $path);
			// storage/dishes/****
		} else {
			$this->validate($request, $rules);
			$path = $dish->image_url;
		}
		// $this->validation($request);
		$dish->title = $request->title;
		$dish->price = $request->price;
		$dish->image_url = $path;
		$dish->description = $request->description;
		$dish->save();
		return redirect()->route('dishes.edit', $dish->id);
	}

	public function destroy(Request $request) {
		$dish = Dish::find($request->id);
		// dd($request->id);
		// $dish = Dish::find($request->id); // - jeigu reikia viena elementa pasirinkti
		$this->imageDelete($dish->image_url);
		$dish->delete();
		return redirect()->route('dishes');
	}

}
