<?php

namespace App\Http\Controllers;
use App\Models\Premium;
use App\Models\Car;
use Illuminate\Http\Request;

class premiumController extends Controller
{
    public function index()
    {
        $premium = Premium::all();
        $cars = Car::all();
        return view('admin.premium', compact('premium', 'cars'));
    }

    public function create()
    {
        $cars = Car::where('insu_id', null)->get();

        return view('admin.createpremium', compact('cars') );
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'price' => 'required',
            'car' => 'required',
            'premium_start_date' => 'required',
            'premium_end_date' => 'required',
            
        ]);

        $premium = new Premium;
        $car = Car::find($request->car);

        $premium->car()->associate($car);

       
        $premium->premium_amount = $request->price;
        $premium->premium_start_date=$request->premium_start_date;
        $premium->premium_end_date = $request->premium_end_date;
        $premium->status = $request->status;
        $start_date = strtotime($request->premium_start_date);
        $end_date = strtotime($request->premium_end_date);

            // Calculate the difference in seconds
            $difference_in_seconds =  $end_date -  $start_date ;

            // Convert difference to days
            $premium->remain_days = $difference_in_seconds / (60 * 60 * 24);
        $premium->save();
        $car->premium_id = $premium->id;
        $premium_id = $premium->id;
        $car->save();

        $savedPremium = Premium::findOrFail($premium->id);

        $cars = Car::all();
        return redirect()->route('premium.index')->with([
            'cars' => Car::all(),
            'savedPremium' => $savedPremium,
            'car' => $car,
            'premium' => $premium,
            'premium_id' => $premium_id,
        ]);
      
    }

    public function destroy(Premium $premium)
    {
        $car = Car::where('premium_id', $premium->id)->first();
        if ($car) {
            $car->premium_id = null;
            $car->save();
        }

        $premium->delete();

        return redirect()->route('premium.index');
    }
}
