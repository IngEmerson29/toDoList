@extends('layouts.layout')

@section('contains')
    <div class="w-full h-full flex items-center justify-center ">
        <form action="{{url('/tasks/' .$task->id)}}" method="POST" class="w-1/2 h-100 bg-amber-50 rounded-2xl flex flex-col gap-5 p-5">
           @csrf
           @method('PUT')
             <div class="flex flex-col gap-4">

                <label class="font-bold text-2xl text-cyan-950" for="title">Title</label>
                <input class="input" type="text"
                    id="title" name="title" value="{{$task->title}}">
            </div>
            <div class="flex flex-col gap-4">

                <label class="font-bold text-2xl text-cyan-950" for="status">Status</label>
                <input class="input"type="text"
                    id="status" name="status" value="{{$task->status}}">
            </div>
            <div class="flex flex-col gap-4">

                <label class="font-bold text-2xl text-cyan-950" for="order">Order</label>
                <input class="input"type="text" readonly
                    id="order" name="order" value="{{$task->order}}">
            </div>
            <div class="flex justify-around items-center ">

                <button type="submit" class="w-1/4 px-4 py-2 rounded-lg cursor-pointer hover:bg-cyan-800 duration-200 bg-cyan-900 text-white font-bold text-center">Update</button>
                <a class="w-1/4 px-4 py-2 rounded-lg cursor-pointer hover:bg-green-500 duration-200 bg-green-600 text-white font-bold text-center" href="{{ url('/tasks') }}">Back</a>

            </div>
        </form>
    </div>
@endsection
