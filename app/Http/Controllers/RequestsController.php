<?php

namespace App\Http\Controllers;

use App\Models\requests;
use Auth;
use Illuminate\Http\Request;


class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //get data from token
        $user = Auth::user();
        $requests = requests::where('user_id', $user->id)->get();
        $total = $requests->count();
        return response()->json([
            'message' => 'Requests fetched successfully',
            'total' => $total,
            'data' => $requests,
            
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'name' => 'required|string|max:255',
                'bar_code' => 'required|string|max:255',
                'description' => 'required|string|nullable',
                'created_at' => 'required|date|nullable',
                
            ]);

            $requests = new requests();
            $requests->user_id = $user->id;
            $requests->name = $request->name;
            $requests->bar_code = $request->bar_code;
            $requests->description = $request->description;
            $requests->created_at = $request->created_at;
            $requests->save();
            
            return response()->json([
                'message' => 'Request created successfully',
                'data' => $requests,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Request creation failed',
                'error' => $e->getMessage(),
            ], 400);
        }

        //call the api in postman 
        //http://localhost:8000/api/requests
        //Header
        //Authorization
        //Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjYwZjI
        //Body
        //form-data
        //key: name
        //value: value
        //Send

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
