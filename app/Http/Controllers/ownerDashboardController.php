<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Reservation;
use App\Models\Insurance;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class ownerDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clients = User::where('role', 'client')->count();
        $admins = User::where('role', 'admin')->count();
        $drivers = User::where('role', 'driver')->count(); // Corrected variable name
        $owners = User::where('role', 'owner')->count(); // Corrected variable name
        $cars = Car::all();

        $reservations = Reservation::paginate(8);
        $insurances = Insurance::all();
        $avatars = User::all();
        return view('owner.ownerDashboard', compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
    }

    public function profile(Request $request)
    {
        $clients = User::where('role', 'client')->count();
        $admins = User::where('role', 'admin')->count();
        $drivers = User::where('role', 'driver')->count(); // Corrected variable name
        $users = User::all()->count(); // Corrected variable name
        $owners = User::where('role', 'owner')->count();
        $cars = Car::all();

        $reservations = Reservation::paginate(8);
        $insurances = Insurance::all();
        $avatars = User::all();
        $user_id = Auth::user()->id;
        return view('owner.profile' , compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
    }

    public function cars(Request $request)
    {
        $clients = User::where('role', 'client')->count();
        $admins = User::where('role', 'admin')->count();
        $drivers = User::where('role', 'driver')->count(); // Corrected variable name
        $users = User::all()->count(); // Corrected variable name
        $owners = User::where('role', 'owner')->count();
        $cars = Car::all();

        $reservations = Reservation::paginate(8);
        $insurances = Insurance::all();
        $avatars = User::all();
        $user_id = Auth::user()->id;
        return view('owner.cars' , compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
    }
}
