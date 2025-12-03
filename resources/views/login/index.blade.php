@extends('layout.main')
@section('body')
<div class="container mx-auto p-4 ">
    <div class="flex flex-col justify-center items-center  ">
    <h1 class="text-3xl font-bold mb-4">Login Page</h1>
    <form action="/login" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="" class="block text-sm font-medium text-gray-700">User</label>
            <input required type="text" id="email" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
            <input required type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Login</button>
        </div>
    </form>
    </div>

</div>
@endsection