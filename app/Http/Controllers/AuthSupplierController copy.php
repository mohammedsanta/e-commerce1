<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);


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
