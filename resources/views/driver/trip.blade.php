@extends('layouts.driverapp')
@section('content')
    {{-- <div class="flex h-screen bg-gray-50 dark:bg-gray-900 w-10/12" > --}}
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl ">
        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid mb-32 ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                      Driver Dashboard  
                    </h2>
                    {{ Auth::user()->id;}}
                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                     
                    </div>



                    <div class="mt-12">
                        <div class="flex align-middle justify-center">
                            <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                            <p class="my-2 mx-8  p-2 font-car font-bold text-gray-600 text-lg ">ORDERS</p>
                            <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                            <hr>
                        </div>

                    </div>

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap overflow-scroll table-auto">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        
                                        <th class="px-4 py-3">USER</th>
                                        <th class="px-4 py-3 w-48">Car</th>
                                        <th class="px-4 py-3 w-24">Started at</th>
                                        <th class="px-4 py-3 w-24">End at</th>
                                        <th class="px-4 py-3">Duration</th>
                                        <th class="px-4 py-3 w-26">Raimining days</th>
                                        <th class="px-4 py-3">Price</th>
                                        <th class="px-4 py-3">Trip Status</th>
                                        <th class="px-4 py-3">Payment Status</th>
                                        
                                        
                                      
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">


                                    @forelse ($confirmedReservations as $reservation)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img loading="lazy" class="object-cover w-full h-full rounded-full"
                                                            src="{{ $reservation->user->avatar }}" alt=""
                                                            loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $reservation->user->name }}</p>
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $reservation->user->email }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $reservation->car->brand }} {{ $reservation->car->model }}

                                            </td>

                                            <td class="px-4 py-3  text-sm">
                                                {{ Carbon\Carbon::parse($reservation->start_date)->format('y-m-d') }} </td>
                                            <td class="px-4 py-3  text-sm">
                                                {{ Carbon\Carbon::parse($reservation->end_date)->format('y-m-d') }} </td>

                                            <td class=" text-xs">
                                                <p class="px-4 py-3 text-sm">
                                                    {{ Carbon\Carbon::parse($reservation->end_date)->diffInDays(Carbon\Carbon::parse($reservation->start_date)) }}
                                                    days </p>
                                            </td>


                                            <td class="px-4 py-3 text-xs">
                                                @if ($reservation->start_date > Carbon\Carbon::now())
                                                    <p class="px-4 py-3 text-sm">
                                                        {{ Carbon\Carbon::parse($reservation->end_date)->diffInDays(Carbon\Carbon::now()) }}
                                                        days
                                                    </p>
                                                @else
                                                    <span class="px-4 py-3 text-sm">
                                                        {{ Carbon\Carbon::parse($reservation->end_date)->diffInDays(Carbon\Carbon::now()) }}
                                                        days
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                Rs {{ $reservation->car->price_per_day * $reservation->days }} 
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                 {{ $reservation->status}} 
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                 {{ $reservation->payment_status}} 
                                            </td>


                                            <td class="px-4 py-3 w-36 text-sm flex flex-col justify-center">

                        <a class="p-2 mb-1 text-white bg-pr-500 hover:bg-pr-400 font-medium rounded text-center"
                            href="{{ route('tripreserve', ['reservation' => $reservation->id]) }}">
                            <button>Edit Status </button>
                        </a>

                      
                        <a style="display:none" class="p-2 mb-1 text-white bg-indigo-500 hover:bg-indigo-600 font-medium rounded text-center"
   href="{{ route('editpayment', ['reservation' => $reservation->id]) }}">
    <button >Edit Payment</button>
</a>



                        

                        </td>

                                        </tr>
                                    @empty
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-center my-12 w-full">
                            {{ $confirmedReservations->links('pagination::tailwind') }}
                        </div>
                    </div>



                </div>
            </main>
        </div>
    </div>
    <script>
        function scrollToReservatios() {
            window.scrollTo({
                top: 300,
                behavior: 'smooth'
            });
        }
    </script>
@endsection
