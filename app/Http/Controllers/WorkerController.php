<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $worker  = Worker::all();
        return response($worker);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $worker = new Worker;

        $worker->username = $request->username;
        $worker->password = $request->password;

        $worker->save();
        // return "store";
        return response($worker);
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        return response($worker);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $worker->username = $request->username;
        $worker->password = $request->password;
        $worker->save();

        return $worker;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {

        $worker->delete();

        return response()->json([
            'message'=>"Worker Deleted successfully."
        ],200);
    }
}
