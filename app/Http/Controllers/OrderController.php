<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private function prepareOrders()
    {
        if (auth()->user()->role == 'manager') {
            return Order::with("company", "sender", "vehicle")
                ->where('company_id', auth()->user()->company->id)
                ->orderBy("updated_at", "desc");
        } else if (auth()->user()->role == 'customer') {
            return Order::with("company", "sender", "vehicle")
                ->where('sender_id', "=", auth()->user()->id)
                ->orderBy("updated_at", "desc");
        } else {
            return Order::with("company", "sender", "vehicle")
                ->orderBy("updated_at", "desc");
        }
    }

    public function index()
    {
        $orders = $this->prepareOrders()->get();
        return view("orders.index", compact('orders'));
    }

    public function create(Request $request)
    {
        $vehicle = Vehicle::where('id', $request->query("id"))
            ->with('company')
            ->firstOrFail();

        return view('orders.create', compact("vehicle"));
    }

    public function store(Request $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);

//        $deliveryPrice = 0.0;
//        if($request->inside_amman) {
//            $deliveryPrice =  $vehicle->price_in_amman
//        } else {
//            $deliveryPrice =  $vehicle->price_outside_amman
//        }

        $deliveryPrice = $request->inside_amman ? $vehicle->price_in_amman : $vehicle->price_outside_amman;

        $order_data = [
            "sender_id" => auth()->user()->id,
            "vehicle_id" => $request->vehicle_id,
            "delivery_price" => $deliveryPrice,
            "company_id" => $vehicle->company_id,
            "inside_amman" => $request->inside_amman == "on",
            "datetime" => $request->datetime,
            "description" => $request->description,
            "sender_price" => $request->sender_price
        ];

        Order::create($order_data);

        return redirect("orders");
    }

    public function show(Order $order)
    {
        $order = Order::where("id", $order->id)
            ->with("company", "sender", "vehicle")
            ->get();
        return view('orders.show', compact('order'));
    }

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
            'description' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        $order->fill($request->all())->save();

        return redirect('orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('orders.index');
    }

    public function results(Request $request)
    {
        if ($request->query("id") == null) {
            return redirect('orders');
        }
        $orders = Order::where("id", $request->id)->get();
        return view('orders.index', compact('orders'));
    }

    public function deliver(Order $order)
    {
        $order->delivered = true;
        $order->save();
        return redirect('orders');
    }
}
