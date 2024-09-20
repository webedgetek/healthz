<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('archived', 'No')->where('status', '=','Active')->get();
        return view('profile.index', compact('users'));
    }

    public function create()
    {
        return view('profile.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'username' => 'required|string|min:1',
        ]);

         $product = User::create([
            'user_id' => $request->product_name,
            'username' => $request->category_id,
        ]); 
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(Request $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('username')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request)
    {

        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current-password'],
        // ]);

        // $user = $request->user();

        // // Auth::logout();
        // $user->delete();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return Redirect::to('/');
    }
}
