<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{
    /**
     * Login Page
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Login Method
     */
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return to_route('index');
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
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegisterRequest $request)
    {

        
        $profileRequest = $request->only(['mobile','country','address']);
        $profileRequest['picture'] = $request->file('picture')->store('profile');

        $userRequest = $request->only(['name','email','country']);

        $user = User::create($request->validated());

        $user->profile()->create($profileRequest);

        return to_route('index')->with(['success' => 'User Has Been Created']);
    }

    public function settings()
    {

        // dd(Auth::user()->profile()->get());

        return view('product.settings');
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
