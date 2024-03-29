@extends('layouts.driverapp')
@section('content')
    {{-- <div class="flex h-screen bg-gray-50 dark:bg-gray-900 w-10/12" > --}}
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl ">
        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid mb-32 ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                      Driver Profile 
                    </h2>
                    
                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <!-- <a href="{{ route('users') }}">
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs hover:bg-pr-200  ">
                                <div class="p-3 mr-4 bg-pr-400 rounded-full ">
                                    <svg style="fill: #fff" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-pr-400 ">
                                        Total clients
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $clients + $admins }} (admins: {{ $admins }}) </p>
                                </div>
                            </div>
                        </a> -->

                        <!-- Card -->
                        <!-- <a href="{{ route('cars.index') }}">
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs  hover:bg-pr-200 ">
                                <div class="p-3 mr-4 bg-pr-400 rounded-full ">
                                    <svg style="fill: #fff" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 512 512">
                                        

                                        <path
                                            d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-pr-400 ">
                                        Available Cars
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $cars->where('status', 'Available')->count() }}
                                    </p>
                                </div>
                            </div>
                        </a> -->

                        <!-- Card -->
                        <!-- <a href="javascript:void(0);" onclick="scrollToReservatios();">
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs  hover:bg-pr-200 ">
                                <div class="p-3 mr-4 bg-pr-400 rounded-full ">
                                    <svg style="fill: #fff" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 512 512">
                                       

                                        <path
                                            d="M184 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H96c-35.3 0-64 28.7-64 64v16 48V448c0 35.3 28.7 64 64 64H416c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H376V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H184V24zM80 192H432V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V192zm176 40c-13.3 0-24 10.7-24 24v48H184c-13.3 0-24 10.7-24 24s10.7 24 24 24h48v48c0 13.3 10.7 24 24 24s24-10.7 24-24V352h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V256c0-13.3-10.7-24-24-24z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-pr-400 ">
                                        Active Reservations
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $reservations->where('status', 'Active')->count() }}
                                    </p>
                                </div>
                            </div>
                        </a> -->

                        <!-- Card -->
                        <!-- <a href="{{ route('insurances.index') }}">
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs  hover:bg-pr-200 ">
                                <div class="p-3 mr-4 bg-pr-400 rounded-full ">
                                    <svg style="fill: #fff" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 512 512">
                                        
                                        <path
                                            d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-pr-400 ">
                                        Active Insurances
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $insurances->count() }}
                                    </p>
                                </div>
                            </div>
                        </a> -->
                    </div>



                    <div class="mt-12">
                        <div class="flex align-middle justify-center">
                            <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                            <p class="my-2 mx-8  p-2 font-car font-bold text-gray-600 text-lg ">PROFILE</p>
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
                                        <th class="px-4 py-3 ">Avatar</th>
                                        <th class="px-4 py-3">ID</th>
                                        <th class="px-4 py-3 w-48">Name</th>
                                        <th class="px-4 py-3 w-24">Email</th>
                                        <th class="px-4 py-3 w-24">Address1</th>
                                        <th class="px-4 py-3">Address2</th>
                                        <th class="px-4 py-3 w-26">City</th>
                                        <th class="px-4 py-3">Pincode</th>
                                        <th class="px-4 py-3">Mobile Number</th>
                                        <th class="px-4 py-3">Alternate Number</th>
                                        <th class="px-4 py-3 ">Age</th>
                                        <th class="px-4 py-3 ">Gender</th>
                                        <th class="px-4 py-3 ">License_number</th>
                                        <th class="px-4 py-3 ">role</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                <td class="px-4 py-3 text-sm">
    <img src="{{ asset(Auth::user()->avatar) }}" alt="User Avatar">
</td>

                                <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->id;}}
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->name;}}
                                            </td>   
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->email;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->address1;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->address2;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->city;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->pincode;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->mobile_no;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->alternate_no;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->age;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->gender;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->license_no;}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                {{ Auth::user()->role;}}
                                            </td>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-center my-12 w-full">
                            {{ $reservations->links('pagination::tailwind') }}
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
