@extends('layouts.app')
@section('content')
    <nav class="flex p-4 ">
        <router-link to="/" class="text-xl text-white mx-3 p-2" active-class="font-bold">Tasks</router-link>
        <router-link to="/tasks" class="text-xl text-white mx-3 p-2" active-class="font-bold">Add Task</router-link>
    </nav>
    <div class="flex justify-center mt-12">
        <router-view></router-view>
    </div>
@endsection
