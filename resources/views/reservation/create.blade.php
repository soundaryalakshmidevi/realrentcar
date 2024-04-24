@extends('layouts.myapp')
@section('content')

{{$combinedacseat}}

{{$enquiry->vehicle_type}}

{{$car->brand}}

{{$car->model}}


{{ $tariff->price_per_km }}
 

    <div class="mx-auto max-w-screen-xl bg-white rounded-md p-6 m-8 ">
        <div class="flex justify-between md:flex-row flex-col ">
            {{-- -------------------------------------------- left -------------------------------------------- --}}
            <div class="md:w-2/3  md:border-r border-gray-800 p-2">

                <h2 class=" ms-4 max-w-full font-car md:text-6xl text-4xl">{{ $car->brand }} {{ $car->model }}
                    {{ $car->engine }}
                </h2>
<!-- 
                <div class=" flex items-end mt-8 ms-4">
                    <h3 class="font-car text-gray-500 text-2xl">Date&Time:</h3>
                    <p>
                        <span
                            class=" text-3xl font-bold text-pr-400 ms-3 me-1 border border-pr-400 p-2 rounded-md">{{ date('D, M d, Y ') }}
                            </span>
                        <span
                            class="text-lg font-medium text-red-500">{{ \Carbon\Carbon::now()->setTimezone('Asia/Kolkata')->format('h:i A') }}
                            
                        </span>
                    </p>
                </div> -->

                <div class=" flex items-center justify-around mt-10 me-10">
                    <div class="w-1/5 md:w-1/3 h-[0.25px] bg-gray-500 "> </div>
                    <p>Order Informations</p>
                    <div class="w-1/5 md:w-1/3 h-[0.25px] bg-gray-500 "> </div>

                </div>

                <div class="px-6 md:me-8">
                    <form id="reservation_form" action="{{ route('car.reservationStore', ['car' => $car->id]) }}"
                        method="POST">
                        @csrf
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <input type="hidden" name="combinedacseat" value="{{ $combinedacseat }}">

                            <input type="text" hidden name="user" value="{{ Auth::user()->id }}">

                            <div class="sm:col-span-3">
                                <label for="full-name" class="block text-sm font-medium leading-6 text-gray-900">Full
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" name="full-name" id="full-name" value="{{ $user->name }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                                </div>
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="email"
                                    class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input type="text" name="email" id="email" value="{{ $user->email }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                                </div>
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            


                            <div class="sm:col-span-3">
                                <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">
                                </label>
                                <div class="mt-2">
                                    <input type="hidden" name="start_date" id="start_date" 
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                                </div>
                                @error('start_date')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">
                                </label>
                                <div class="mt-2">
                                    <input type="hidden" name="end_date" id="end_date" 
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                                </div>
                                @error('end_date')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-6">
    <label class="block text-sm font-medium leading-6 text-gray-900">Plan</label>
    <div class="mt-2 flex space-x-6">
        <div>
            <input type="radio" id="per_km" name="plan" value="per_km" class="text-pr-400 focus:ring-pr-400" onclick="showFields('per_km')">
            <label for="per_km" class="ml-2">Per Kilometer</label>
        </div>
        <div>
            <input type="radio" id="per_hr" name="plan" value="per_hr" class="text-pr-400 focus:ring-pr-400" onclick="showFields('per_hr')">
            <label for="per_hr" class="ml-2">Per Hour</label>
        </div>
        <div>
            <input type="radio" id="per_day" name="plan" value="per_day" class="text-pr-400 focus:ring-pr-400" onclick="showFields('per_day')">
            <label for="per_day" class="ml-2">Per Day</label>
        </div>
    </div>
    <div id="extraFields" class="mt-2">
        <!-- Extra fields will be displayed here based on selection -->
    </div>
    @error('plan')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
<script>
    function showFields(plan) {
        let extraFields = document.getElementById('extraFields');
        let fieldsHTML = '';

        if (plan === 'per_km') {
            fieldsHTML = `
                <div class="sm:col-span-3">
                    <label for="start_km" class="block text-sm font-medium leading-6 text-gray-900">Start Kilometer
                    </label>
                    <div class="mt-2">
                        <input type="text" name="start_km" id="start_km" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('start_km')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="end_km" class="block text-sm font-medium leading-6 text-gray-900">End Kilometer
                    </label>
                    <div class="mt-2">
                        <input type="text" name="end_km" id="end_km" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('end_km')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            `;
        } else if (plan === 'per_hr') {
            fieldsHTML = `
                <div class="sm:col-span-3">
                    <label for="start_hour" class="block text-sm font-medium leading-6 text-gray-900">Start Hour
                    </label>
                    <div class="mt-2">
                        <input type="time" name="start_hour" id="start_hour" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('start_hour')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="end_hour" class="block text-sm font-medium leading-6 text-gray-900">End Hour
                    </label>
                    <div class="mt-2">
                        <input type="time" name="end_hour" id="end_hour" 
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('end_hour')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            `;
        } else if (plan === 'per_day') {
            fieldsHTML = `
                <div class="sm:col-span-3">
                    <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Start date
                    </label>
                    <div class="mt-2">
                        <input type="date" name="start_date" id="start_date" value="{{$enquiry->start_date}}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('start_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">End date
                    </label>
                    <div class="mt-2">
                        <input type="date" name="end_date" id="end_date" value="{{$enquiry->end_date}}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('end_date')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            `;
        }

        extraFields.innerHTML = fieldsHTML;
    }
</script>


                        <div class="mt-12 md:block hidden">
                            <button type="submit"
                                class="text-white bg-pr-400 p-3 w-full rounded-lg font-bold hover:bg-black shadow-xl hover:shadow-none ">Order
                                Now</button>
                        </div>
                    </form>
                </div>

            </div>

            {{-- -------------------------------------------- right -------------------------------------------- --}}

            <div class="md:w-1/3 flex flex-col justify-start items-center">
                <div class="relative mx-3 mt-3 flex h-[200px] w-3/4   overflow-hidden rounded-xl shadow-lg">
                    <img loading="lazy" class="h-full w-full object-cover" src="{{ $car->image }}" alt="product image" />
                    <span
                        class="absolute w-24 h-8 py-1 top-0 left-0 m-2 rounded-full bg-pr-400 px-2 text-center text-sm font-medium text-white">{{ $car->reduce }}
                        %
                        OFF</span>
                </div>
                <p class=" ms-4 max-w-full font-car text-xl mt-3 md:block hidden">{{ $car->brand }} {{ $car->model }}
                    {{ $car->engine }}
                </p>
                <div class="mt-3 ms-4 md:block hidden">
                    <div class="flex items-center">
                        @for ($i = 0; $i < $car->stars; $i++)
                            <svg aria-hidden="true" class="h-4 w-4 text-pr-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        @endfor
                        <span
                            class="mr-2 ml-3 rounded bg-pr-300 px-2.5 py-0.5 text-sm font-semibold">{{ $car->stars }}.0</span>
                    </div>
                </div>

                <div class=" me-16 flex   mt-6 ms-4">

                    @if ($car->insurance)
                        <p class="mx-2 font-car text-gray-700  text-sm"><span
                                class="font-car text-gray-600 text-lg">Insurance: </span>{{ $car->insurance->type }} from
                            {{ $car->insurance->company }} Insurances</p>
                    @else
                        <p class="mx-3 text-red-600 text-md "><span class="font-car text-gray-600 text-lg">Insurance:
                            </span> Not asured !!!</p>
                    @endif
                </div>

                <div class=" w-full   mt-8 ms-8">
                    <p id="duration" class="font-car text-gray-600 text-lg ms-2">Plan Type: <span
                            class="mx-2 font-car text-md font-medium text-gray-700 border border-pr-400 p-2 rounded-md "> 
                            No Plan</span>
                    </p>
                </div>

                <div class=" w-full   mt-8 ms-8">
                    <p id="total-price" class="font-car text-gray-600 text-lg ms-2">Total Price: <span
                            class="mx-2 font-car text-md font-medium text-gray-700 border border-pr-400 p-2 rounded-md "> 
                            RS:0</span>
                    </p>
                </div>
                <div id="mobile_submit_button" class="mt-12 w-full md:hidden  ">
                    <button type="submit"
                        class="text-white bg-pr-400 p-3 w-full rounded-lg font-bold hover:bg-black shadow-xl hover:shadow-none ">Order
                        Now</button>
                </div>
            </div>
        </div>



    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {
            
        //     $('#start_date, #end_date').change(function() {
        //         var startDate = new Date($('#start_date').val());
        //         var endDate = new Date($('#end_date').val());

        //         if (startDate && endDate && startDate <= endDate) {
        //             var duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
        //             var pricePerDay = {{ $car->price_per_day }};
        //             var totalPrice = duration * pricePerDay;

        //             $('#duration span').text(duration + ' days');
        //             $('#total-price span').text(totalPrice + ' $');
        //         } else {
        //             $('#duration span').text('X days');
        //             $('#total-price span').text('Y $');
        //         }
        //     });
        // });

    $(document).ready(function() {
        $('input[name="plan"]').change(function() {
            var selectedPlan = $('input[name="plan"]:checked').val();

            // Update fields based on the selected plan
            if (selectedPlan === 'per_km') {
                var pricePerKm = '{{ $tariff->price_per_km }}';
                $('#duration span').text('1 km');
                $('#total-price span').text(pricePerKm + ' Rs');
            } else if (selectedPlan === 'per_hr') {
                var pricePerHr = '{{ $tariff->price_per_hr }}';
                $('#duration span').text('1 hour');
                $('#total-price span').text(pricePerHr + ' RS');
            } else if (selectedPlan === 'per_day') {
                var pricePerDay = '{{ $tariff->price_per_day }}';
                $('#duration span').text('1 day');
                $('#total-price span').text(pricePerDay + ' RS');
            }
        });
    });


        document.getElementById("mobile_submit_button").addEventListener("click", function() {
            document.getElementById("reservation_form").submit();
        });
    </script>
@endsection