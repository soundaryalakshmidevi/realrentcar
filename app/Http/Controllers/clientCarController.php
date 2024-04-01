<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class clientCarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $cars = Car::where('status', '=', 'available')->paginate(9);
        // return view('cars.cars', compact('cars'));

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Now you can use these variables to perform any necessary actions
        // For example, you can pass them to a model to retrieve data from the database

        // Once you've processed the data, you can return the view with the relevant data
        $cars = Car::where('status', '=', 'available')->paginate(9);
        return view('cars.cars', compact('cars'))->with([
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
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
        //
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
