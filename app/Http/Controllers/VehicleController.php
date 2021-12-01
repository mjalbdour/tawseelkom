<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // user must be of role superadmin
        $vehicles = Vehicle::all();
        return view("vehicles.index", compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // user must be of role superadmin
        return view('compnies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // user must be of role superadmin
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'price_in_amman' => 'required',
            'price_outside_amman' => 'required',
            'size' => 'required',
            'company_id' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        Vehicle::create($request->all());

        return redirect('vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vehicle $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $Vehicle)
    {
        return view('vehicles.show', compact('Vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vehicle $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $Vehicle)
    {
        return view('vehicles.edit', compact('Vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vehicle $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $Vehicle)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'price_in_amman' => 'required',
            'price_outside_amman' => 'required',
            'size' => 'required',
            'company_id' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        $Vehicle->fill($request->all())->save();

        return redirect('vehicles.show', compact('Vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vehicle $Vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $Vehicle)
    {
        $Vehicle->delete();
        return redirect('vehicles.index');
    }
}
