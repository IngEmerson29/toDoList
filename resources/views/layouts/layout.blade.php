<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>ToDoList</title>
</head>

<body class=" bg-cyan-900 w-screen gap-5 px-4 h-screen flex flex-col  ">

    @if (Auth::check())
        <div class="bg-cyan-700 w-full py-3 rounded-b-lg ">
            <ul class="flex w-full font-bold text-white text-[18px] justify-evenly items-center">
                <li><a href="/tasks">Add Tasks</a></li>
                @if (Auth::check())
                
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <li><button class="cursor-pointer">Logout</button></li>
                </form>
                @endif

            </ul>
        </div>
    @endif

    @yield('contains')


</body>

</html>
