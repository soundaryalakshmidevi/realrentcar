<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Reservation;
use App\Models\Insurance;

class adminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
            $clients = User::where('role', 'client')->count();
            $admins = User::where('role', 'admin')->count();
            $drivers = User::where('role', 'driver')->count();
            $owners = User::where('role', 'owner')->count();
            $users = User::all()->count();
        // $admins = User::all();
        $cars = Car::all();

        $reservations = Reservation::paginate(8);
        $insurances = Insurance::all();
        $avatars = User::all();
        return view('admin.adminDashboard', compact('clients','users' , 'avatars', 'admins', 'cars', 'reservations', 'insurances'));
    }
}
