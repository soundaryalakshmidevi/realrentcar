<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(8);
        return view('admin.cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email_id' => 'required',
            'vehicle_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'engine' => 'required',
            'seat' => 'required|integer',
            'luggage' => 'required|integer',
            'ac' => 'required|in:yes,no',
            'approval' => 'required|in:pending,confirm',
            'vehicle_type' => 'required|in:car,van,bus',
            'price_per_km' => 'nullable|numeric',
            'price_per_hr' => 'nullable|numeric',
            'price_per_day' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            //'quantity' => 'required|integer',
            'insurance_status' => 'required|in:active,pending,confirm',
            'status' => 'required|in:available',
        ]);
    
        $car = new Car;
        $car->email_id = $request->email_id;
        $car->vehicle_id = $request->vehicle_id;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->engine = $request->engine;
        $car->seat = $request->seat;
        $car->luggage = $request->luggage;
        $car->ac = $request->ac;
        $car->approval = $request->approval;
        $car->vehicle_type = $request->vehicle_type;
        $car->price_per_km = $request->price_per_km;
        $car->price_per_hr = $request->price_per_hr;
        $car->price_per_day = $request->price_per_day;
        // $car->quantity = $request->quantity;
        $car->insurance_status = $request->insurance_status;
        $car->reduce = $request->reduce;
        $car->stars = $request->stars;
        $car->status = $request->status;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            try {
                $imageName = $request->brand . '-' . $request->model . '-' . $request->engine . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/cars', $imageName);
                $car->image = Storage::url($path);
                $image->move(public_path('images/cars'), $imageName);
                $car->image = 'images/cars/' . $imageName;
            } catch (\Exception $e) {
                Log::error('Error storing image: ' . $e->getMessage());
                // Handle the error appropriately, e.g., return a response with an error message
            }
        }
    
        $car->save();
    
        return redirect()->route('cars.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    public function edit(Car $car)
    {
        $car = Car::findOrFail($car->id);
        
        return view('admin.updateCar', compact('car'));
    }

   
    public function update(Request $request, Car $car)
{
    $request->validate([
        'email_id' => 'required',
        'vehicle_id' => 'required',
        'brand' => 'required',
        'model' => 'required',
        'engine' => 'required',
        'seat' => 'required|integer',
        'luggage' => 'required|integer',
        'ac' => 'required|in:yes,no',
        'approval' => 'required|in:pending,confirm',
        'vehicle_type' => 'required|in:car,van,bus',
        'price_per_km' => 'nullable|numeric',
        'price_per_hr' => 'nullable|numeric',
        'price_per_day' => 'nullable|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        //'quantity' => 'required|integer',
        'insurance_status' => 'required|in:active,pending,confirm',
        'status' => 'required|in:available,unavailable',
        'premium'=>'required',
    ]);

    $car = Car::findOrFail($car->id);

    $car->email_id = $request->email_id;
    $car->vehicle_id = $request->vehicle_id;
    $car->brand = $request->brand;
    $car->model = $request->model;
    $car->engine = $request->engine;
    $car->seat = $request->seat;
    $car->luggage = $request->luggage;
    $car->ac = $request->ac;
    $car->approval = $request->approval;
    $car->vehicle_type = $request->vehicle_type;
    $car->price_per_km = $request->price_per_km;
    $car->price_per_hr = $request->price_per_hr;
    $car->premium = $request->premium;
    $car->price_per_day = $request->price_per_day;
    $car->insurance_status = $request->insurance_status;
    $car->status = $request->status;
    $car->reduce = $request->reduce;
    $car->stars = $request->stars;

    if ($request->hasFile('image')) {
        // Delete old image after assigning new one
        $image = $request->file('image');
        $oldImagePath = $car->image;
        // $imageName = $request->brand . '-' . $request->model . '-' . $request->engine . '-' . Str::random(10) . '.' . $request->file('image')->extension();
        // $image = $request->file('image');
        // $path = $image->storeAs();
        // $car->image = $path;

        $imageName = $request->brand . '-' . $request->model . '-' . $request->engine . '-' . Str::random(10) . '.' . $request->file('image')->extension();
        $path = $image->storeAs('images/cars', $imageName);
        $car->image = Storage::url($path);
        $image->move(public_path('images/cars'), $imageName);
        $car->image = 'images/cars/' . $imageName;
    
        // Delete old image
        if ($oldImagePath) {
            $oldImagePath = str_replace('storage', 'public', $oldImagePath);
            unlink(public_path($oldImagePath));
        }
    }
    

    $car->save();

    return redirect()->route('cars.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car = Car::findOrFail($car->id);
        if ($car->image) {
            // Get the filename from the image path
            $filename = basename($car->image);

            // Delete the image file from the storage
            Storage::disk('local')->delete('images/cars/' . $filename);
            $car->delete();
        }



        return redirect()->route('cars.index');
    }
}
