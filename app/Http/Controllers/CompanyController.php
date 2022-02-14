<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->user()->role == "admin") {
                return $next($request);
            }
            return redirect("home");
        })->except("show");

        $this->middleware(function ($request, $next) {
            if (
                $request->user()->role == "admin"
                ||
                $request->user()->company->id == $request->route('company')->id
            ) {
                return $next($request);
            }
            return redirect('home');
        })->only("show");
    }

    public function index()
    {
        $companies = self::prepareCompanies()->get();
        return view("companies.index", compact('companies'));
    }

    public function create()
    {
        $managers = User::where("role", "manager")->get();
        return view('companies.create', compact("managers"));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'manager_id' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        Company::create($request->all());

        return redirect(route('companies.index'));
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        $managers = User::pluck("name", "id");
        return view('companies.edit', compact("company", "managers"));
    }

    public function update(Request $request, Company $company)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'manager_id' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        $company->fill($request->all())->save();

        return redirect(route('companies.index'));
    }

    public function results(Request $request)
    {
        if ($request->query("name") == null) {
            $companies = static::prepareCompanies()->get();
        } else {
            $name = "%" . $request->name . "%";
            $companies = Company::with("manager")
                ->where("name", "like", $name)
                ->orderBy("updated_at", "desc")
                ->get();
        }
        return view('companies.index', compact('companies'));
    }

    private static function prepareCompanies()
    {
        return Company::orderBy("updated_at", "desc");
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('companies.index'));
    }
}
