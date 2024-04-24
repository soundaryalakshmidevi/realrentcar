<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Trip;
use App\Models\Reservation;
use App\Models\Insurance;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function confirmStatus(Reservation $reservation, Trip $trip)
    {
        $driverId = Auth::id();
    
        $reservation = Reservation::find($reservation->id);
    
        $reservation->status = 'Confirm';
    
        $reservation->driver_id = $driverId;
        $trip = new Trip();
        $trip->driver_id = Auth::id(); // Assuming you have a logged-in driver
        $trip->user_id = $reservation->user_id;
        $trip->booking_id = $reservation->id;
        $trip->car_id = $reservation->car_id;
        $trip->tariff_id = $reservation->tariff_id;
        $trip->start_loc = $reservation->start_loc;
        $trip->end_loc = $reservation->end_loc;
        $trip->start_date = $reservation->start_date;
        $trip->end_date = $reservation->end_date;
        $trip->start_hr = $reservation->start_hr;
        $trip->end_hr = $reservation->end_hr;
        $trip->start_km = $reservation->start_km;
        $trip->end_km = $reservation->end_km;
        $trip->total_amount = $reservation->total_price;
        $trip->payment_status = $reservation->payment_status;
    
        $trip->save();
    
        // Save the changes
        $reservation->save();
    
        // Fetch only the reservations with status "Confirm"
        $confirmedReservations = Reservation::where('status', 'Confirm')->paginate(8);
    
        // Fetch other necessary data
        $clients = User::where('role', 'client')->count();
        $admins = User::where('role', 'admin')->count();
        $drivers = User::where('role', 'driver')->count(); // Corrected variable name
        $users = User::all()->count(); // Corrected variable name
        $owners = User::where('role', 'owner')->count();
        $cars = Car::all();
        $avatars = User::all();
        $insurances = Insurance::all();
        // Fetch trips related to this reservation
        //$trips = Trip::where('booking_id', $reservation->id)->get();
        $trips = Trip::where('status', 'process')->get();
        dd($trips);

        // Pass all data to the view
        return view('driver.trip', compact( 'confirmedReservations', 'insurances', 'trips','reservation'));
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
