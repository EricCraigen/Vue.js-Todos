@extends('layouts.base')

@section('body')

<main class="min-h-screen relative z-0">

    {{-- <x-app.navigation.main /> --}}

    <div class="grid grid-cols-12 min-h-screen bg-jet">



        <div class="col-span-1 lg:col-span-2"></div>

        <div class="col-span-10 lg:col-span-8">
            @isset($header)
                <h1 class="text-bone text-xl md:text-5xl font-bold mb-14 mt-5">
                    {{ $header }}
                </h1>
            @endisset

            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset

        </div>

        <div class="col-span-1 lg:col-span-2"></div>

    </div>

    {{-- <x-app.footer.footer /> --}}

</main>


@endsection
