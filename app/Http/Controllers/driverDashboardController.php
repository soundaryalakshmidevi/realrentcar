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

    public function editStatus(Reservation $reservation)
    {
        // Retrieve authenticated driver's ID
        $driverId = Auth::id();
    
        // Find the reservation
        $reservation = Reservation::find($reservation->id);
    
        // Update the status to "Confirm"
        $reservation->status = 'Confirm';
    
        // Update the driver_id field
        $reservation->driver_id = $driverId;
    
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
    
        // Redirect to the orderconfirm page
        return view('driver.orderconfirm', compact('clients', 'avatars', 'admins', 'drivers', 'owners', 'cars', 'confirmedReservations', 'insurances'));
    }
    

    public function updateStatus(Reservation $reservation, Request $request)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->status = $request->status;
        $car = $reservation->car;
        if($request->status == 'Ended' || $request->status == 'Canceled' ){
            $car->status = 'Available';
            $car->save();
        }
        $reservation->save();
        return redirect()->route('driverDashboard');
    }

}
