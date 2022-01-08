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
        return view('companies.create');
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
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
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

        $vehicle->fill($request->all())->save();

        return redirect('vehicles.show', compact('vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect('vehicles.index');
    }

    public function search()
    {
        return view('vehicles.search');
    }

    public function results()
    {
        // get list based on filters
        $vehicles = Vehicle::where()->get();
        return view('vehicles.results', compact('vehicles'));
    }
}
