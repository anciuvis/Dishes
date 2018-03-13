<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Dish;

class CartController extends Controller
{
	public function __construct() {
		$this->middleware('admin')->except('index', 'show', 'store');
	}

		/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$token = csrf_token();
			$cart = Cart::where('remember_token', $token)->whereNull('order_id')->get();
			// dd($cart);
			return view('cart', [
				'cart' => $cart,
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			// dd($request);

			$this->validate($request,[
				'dish_id' => 'required|numeric|digits_between:1,11'
			]);

			$cart = new Cart;
      $cart->remember_token = $request->_token;
      $cart->dish_id = $request->dish_id;
      $cart->save();

      $cart->dish; // fires cart->dish model relationship

      echo json_encode($cart);
      // return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
			$token = csrf_token();
			$cart = Cart::where('remember_token', $token)->where('id', $request->id); // kadangi trinam po viena itema - nebutina ->get()
			// dd($cart);
			$cart->delete();
			return redirect()->route('carts.index');
    }
}
