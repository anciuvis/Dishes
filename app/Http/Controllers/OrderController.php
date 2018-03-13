<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\Mail\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Helpers\Cart as CartHelp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
		/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			if (Auth::check() && Auth::user()->role == 'admin') {
				$orders = Order::all();
			}
			else {
				$orders = Order::where('user_id', Auth::user()->id)->get();
			}
			return view('orders', [
				'orders' => $orders,
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

    public function store(Request $request) // reikia requesto jei kvieciamas tokenas is ten o ne is sesijos
    {
			// dd($request);
			$token = csrf_token(); // paimamas is sesijos, bet galima is is $request->_token
			$cart = Cart::where('remember_token', $token)->whereNull('order_id')->get();
			$order = new Order();
			$order->user_id = Auth::user()->id;
			$order->total_amount = CartHelp::total();
			$order->tax_amount = CartHelp::vat();
			$order->save();

			foreach ($cart as $item) { // kadangi ->get() metodas grazina array - reikia prasukt ji per foreach kad suveiktu
				$item->user_id = Auth::user()->id;
				$item->order_id = $order->id;
				$item->save();
			}

			Mail::to($request->user())->send(new OrderCreated($order));

			$request->session()->flash('success', 'Order created successfully. Thank you for your order!');
			return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
