@extends('layouts.layout')

@section('contains')


@if (session('message'))

<div id="alert" class="w-full flex flex-col place-items-center">

    <div class="bg-cyan-600 p-4 w-1/4 rounded-2xl h-auto transition-opacity duration-1000 opacity-100">
        <h1 class="font-bold text-center text-white text-[18px]">{{session('message')}}</h1>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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

    <div class="w-full h-screen grid place-items-center">
        <div class="p-5 w-120 bg-white h-min-100 rounded-lg flex flex-col gap-5  ">

            <form action="{{ url('/tasks') }}" method="POST" class="flex flex-col gap-3">
                @csrf
                <label class="font-bold text-2xl text-cyan-950" for="task">Add a Task</label>
                <div class="flex gap-4">
                    <input class="w-80 font-bold focus:outline-none focus:ring-2 focus:ring-cyan-500 px-4 h-10 rounded-lg border border-gray-400"
                        type="text" name="title" placeholder="What do you need to do today?" id="task">
                    <button
                        class="w-1/4 rounded-lg cursor-pointer hover:bg-cyan-800 duration-200 bg-cyan-900 text-white font-bold text-center"
                        type="submit">Add</button>
                </div>
            </form>



            <div class="flex flex-col gap-4">
                <div class="w-full">

                    <ul class="flex text-cyan-950 flex-col gap-5 font-bold">
                        @foreach ($task as $tasks)
                            <li class="flex items-center justify-between">
                                <p class="text-[18px]">{{ $tasks->title }}</p>
                                <div class="flex items-center justify-between gap-4">
                                    <a href="{{ url('/tasks/' . $tasks->id) }}"><i
                                            class="bi bi-pencil-square text-[20px]"></i></a>
                                    <form action="{{ url('/tasks/' . $tasks->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Quieres borrar?')"><i
                                                class="bi bi-trash cursor-pointer text-[20px]"></i></button>
                                    </form>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                    <div class="mt-4">
                        {{ $task->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
