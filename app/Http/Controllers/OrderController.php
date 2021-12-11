<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view("vehicles.index", compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'order_sender_id' => 'required',
            'company_id' => 'required',
            'vehicle_id' => 'required',
            'inside_amman' => 'required',
            'datetime' => 'required',
            'sender_price' => 'required',
            'delivery_price' => 'required',
            'delivered' => 'required',
            'approved' => 'required',
            'canceled' => 'required',
            'description' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        Order::create($request->all());

        return redirect('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validation = Validator::make($request->all(), [
            'order_sender_id' => 'required',
            'company_id' => 'required',
            'vehicle_id' => 'required',
            'inside_amman' => 'required',
            'datetime' => 'required',
            'sender_price' => 'required',
            'delivery_price' => 'required',
            'delivered' => 'required',
            'approved' => 'required',
            'canceled' => 'required',
            'description' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        $order->fill($request->all())->save();

        return redirect('orders.show', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('orders.index');
    }
}
