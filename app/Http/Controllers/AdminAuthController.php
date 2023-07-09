<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Message;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\ChangePasswordRequest;

class AdminAuthController extends Controller
{


    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::guard('admin')->attempt($credentials)) {

            request()->session()->regenerate();

            return to_route('admin.dashboard');
        }

        return back()->withErrors(['name' => 'Wrong Credentials']);
    }

    public function logout()
    {
        request()->session()->regenerateToken();
        request()->session()->invalidate();
        return to_route('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRegisterRequest $request)
    {
        // dd($request->only('owner_type','owner_id','picture','mobile','country','address'));
        
        $admin = Admin::create($request->only('user_id','name','email','profileable_type','profileable_id','password'));

        $profile = $request->only('owner_type','picture','mobile','country','address');
        $profile['picture'] = $request->file('picture')->store('profile');
        $profile['owner_id'] = $admin->id;

        Profile::create($profile);

        return to_route('admin.login')->with(['success' => 'Admin Has Been Created']);
    }

    public function changeView()
    {
        return view('admin.change-password');
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



    // Admin Panel




}
