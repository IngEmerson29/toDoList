@extends('layouts.layout')

@section('contains')

   

    <div class="h-screen flex flex-col gap-5 items-center justify-center">

        @if ($errors->any())
        <div id="alert" class="w-full flex flex-col place-items-center">

            <div class="bg-cyan-600 p-4 w-1/4 rounded-2xl h-auto transition-opacity duration-1000 opacity-100">
                @foreach ($errors->all() as $error )
                <h1 class="font-bold text-center text-white text-[18px]">{{$error}}</h1>
                @endforeach
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alert = document.getElementById('alert');

                setTimeout(() => {
                    const inner = alert.firstElementChild;
                    inner.classList.remove('opacity-100');
                    inner.classList.add('opacity-0');

                    setTimeout(() => {
                        alert.remove();
                    }, 1000);
                }, 2000);
            });
        </script>
    @endif

        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6 text-cyan-950">Log In</h2>

            <form action="{{ url('/login') }}" method="POST">
                @csrf

               
                <div class="mb-4">
                    <label for="email" class="block  text-sm font-bold text-cyan-950 mb-1">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full px-4 py-2 border border-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 text-black"
                        required>
                </div>

             
                <div class="mb-6">
                    <label for="password" class="block text-sm font-bold text-cyan-950 mb-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 text-black"
                        required>
                </div>

               
                <button type="submit"
                    class="w-full bg-cyan-500 text-white cursor-pointer py-2 rounded-xl font-bold hover:bg-cyan-600 transition-colors duration-300">
                    Log In
                </button>
            </form>
        </div>
    </div>
@endsection
