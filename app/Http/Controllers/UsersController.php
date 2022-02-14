<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    private function prepareUsers()
    {
        return User::orderBy("updated_at", "desc");
    }

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->user()->role != "admin") {
                return redirect('home');
            }
            return $next($request);
        })->except("show");

        $this->middleware(function (Request $request, $next) {
            if (
                in_array($request->user()->role, ["admin", "manager"])
                ||
                $request->user()->id == $request->route('user')->id
            ) {
                return $next($request);
            }
            return redirect(route('home'));
        })->only("show");
    }

    public function index()
    {
        $users = $this->prepareUsers()->get();
        return view("users.index", compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return redirect('users.create');
        }
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'role' => 'required|in:customer,manager'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        $encrypted_password = Hash::make($request->password);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $encrypted_password;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();
        return redirect('users');
    }


    public function show(Request $request, User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'role' => 'required|in:customer,manager'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->with($validation->getMessageBag());
        }

        $user->fill($request->all())->save();

        return redirect('users');
    }

    public function destroy(User $user)
    {
        if ($user->role == 'admin') {
            return redirect('users');
        }
        $user->delete();
        return redirect('users');
    }

    public function results(Request $request)
    {
        if ($request->query("name") == null) {
            $users = $this->prepareUsers()->get();
        } else {
            $name = "%" . $request->query('name') . "%";
            $users = User::where("name", "like", $name)->get();
        }
        return view('users.index', compact('users'));
    }
}
