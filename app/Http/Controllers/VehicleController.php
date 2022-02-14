<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = static::prepareVehicles()->get();
        $vehicleTypes = config("constants.vehicle_sizes");
        return view("vehicles.index", compact('vehicles', 'vehicleTypes'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('vehicles.create', compact('companies'));
    }

    public function store(Request $request)
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

        Vehicle::create($request->all());

        return redirect('vehicles');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

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

        return redirect('vehicles');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect('vehicles');
    }

    public function results(Request $request)
    {
        if ($request->query("size") == null) {
            $vehicles = static::prepareVehicles()->get();
        } else {
            $vehicles = Vehicle::with("company")
                ->whereIn("size", $request->query("size"))
                ->orderBy("size")
                ->get();
        }
        $vehicleTypes = config("constants.vehicle_sizes");
        return view('vehicles.index', compact('vehicles', 'vehicleTypes'));
    }

    private static function prepareVehicles()
    {
        return Vehicle::orderBy("updated_at", "desc");
    }
}
