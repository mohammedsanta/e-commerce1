<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\SupplierRegisterRequest;

class AuthSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier.supplier');
    }

    public function loginPage()
    {
        return view('supplier.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => [],
        ]);

        if(Auth::guard('supplier')->attempt($credentials)) {

            $request->session()->regenerate();

            return to_route('supplier.index');
        }

        return back()->withErrors(['name' => 'Wrong Credentials']);
    }

    /**
     * Logout Method
     */
    public function logout(Request $request)
    {

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return to_route('index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRegisterRequest $request)
    {
        $supplier = Supplier::create($request->only('name','email','password'));

        $picture = $request->file('picture')->store('profile');

        Profile::create([
            'picture' => $picture,
            'mobile' => $request->mobile,
            'country' => $request->country,
            'address' => $request->address,
            'owner_type' => 'App\Models\Supplier',
            'owner_id' => $supplier->id,
        ]);

        return to_route('supplier.loginPage');
    }

    public function changeView()
    {
        return view('supplier.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if(!Hash::check($request->old,Auth::user()->password)) {
            return back()->withErrors(['old' => 'Wrong Password']);
        }

        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->new)
        ]);

        return back()->with(['success' => 'Password Changed']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
