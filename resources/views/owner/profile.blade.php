@extends('layouts.ownerapp')
@section('content')
    <div class="mx-auto max-w-screen-xl">
        <div class=" bg-white rounded-md p-20 flex md:flex-row flex-col md:my-12 justify-center">
           
                <div class="flex ">
                    <img loading="lazy" class="w-[150px]" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                </div>
                <div class="text-center md:text-start">
                    <h2 class="text-lg font-medium text-gray-900"><span
                            class="text-lg font-car font-normal text-gray-500">Name:
                        </span>{{ Auth::user()->name }}</h2>
                    <h2 class="text-lg font-medium text-gray-900"><span
                            class="text-lg font-car font-normal text-gray-500">Eamil:
                        </span>{{ Auth::user()->email }}</h2>

                    <h2 class="text-lg font-medium text-green-600"><span
                            class="text-lg font-car font-normal text-gray-500">Active
                            Reservations: </span>{{ Auth::user()->reservations->where('status', 'Active')->count() }}</h2>
                    <h2 class="text-lg font-medium text-yellow-300"><span
                            class="text-lg font-car font-normal text-gray-500">Pending
                            Reservations: </span>{{ Auth::user()->reservations->where('status', 'Pending')->count() }}</h2>
                    <h2 class="text-lg font-medium text-Black"><span
                            class="text-lg font-car font-normal text-gray-500">Ended
                            Reservations: </span>{{ Auth::user()->reservations->where('status', 'Ended')->count() }}</h2>
                    <h2 class="text-lg font-medium text-red-600"><span
                            class="text-lg font-car font-normal text-gray-500">Canceled
                            Reservations: </span>{{ Auth::user()->reservations->where('status', 'Canceled')->count() }}</h2>
                    <h2 class="text-lg font-medium text-pr-400"><span
                            class="text-lg font-car font-normal text-gray-500">Total
                            Reservations: </span>{{ Auth::user()->reservations->count() }}</h2>

                </div>
            

            

        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var paymentMethodSelect = document.getElementById("payment_method");
        var qrCodeDiv = document.getElementById("qr_code");

        paymentMethodSelect.addEventListener("change", function() {
            if (paymentMethodSelect.value === "qr_code") {
                qrCodeDiv.classList.remove("hidden");
            } else {
                qrCodeDiv.classList.add("hidden");
            }
        });
    });
</script>