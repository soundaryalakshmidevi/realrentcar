<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Reservation;
use App\Models\Insurance;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class driverDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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
        return view('driver.driverDashboard', compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
    }

    public function index(Request $request)
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
        return view('driver.dashboard', compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
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
        return view('driver.profile' , compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
    }

    public function trip(Request $request)
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
        return view('driver.trip' , compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'reservations', 'insurances')); // Corrected variable names
    }
}
