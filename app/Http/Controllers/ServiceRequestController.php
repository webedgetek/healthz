<?php

namespace App\Http\Controllers;

use App\Models\SponsorType;
use Illuminate\Http\Request;
use App\Models\User;

class ServiceRequestController extends Controller
{
    
     public function index()
    {
        // $service_resuest = ;
         // $service_request = Relation::with('users')->get();
        $sponsors = SponsorType::where('archived', 'No')->where('status', '=','Active')->get();
        return view('service.index', compact('sponsors'));
    }

    public function create()
    {

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

    public function show(Request $request)
    {
       
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

        
    }
}
