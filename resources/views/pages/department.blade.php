@extends('layouts.dashboard')

@section('dashboard')
<div class="px-12">
    <div class="w-full flex justify-between">
        <p class="text-xl font-bold">List Department</p>
        <a href="/department/add"> <button class="bg-green-400 py-2 px-4 rounded-md text-white">Add New</button></a>
    </div>
        <div class="relative overflow-x-auto mt-4">
            @if (\Session::has('success'))
                <div class="bg-green-300 w-full px-6 py-6 rounded-md mb-4">
                    {!! \Session::get('success') !!}
                </div>
            @endif
            @if (\Session::has('error'))
                <div class="bg-red-300 w-full px-6 py-6 rounded-md mb-4">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <table class="w-full text-sm text-left rtl:text-right bg-white shadow-lg">
                <thead class="text-xs text-gray-700 uppercase border-b ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Employee
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4 font-medium">
                                {{ $department->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $department->total_employee }}
                            </td>
                            <td class="flex flex-col space-y-2 py-2">
                                <a href="/department/edit/{{ $department->id }}" class="py-1 text-center text-xs font-light bg-yellow-100">Edit</a>
                                <a href="/department/employee/{{ $department->id }}" class="py-1 text-center text-xs font-light bg-green-300">Show Employee</a>
                                <a href="#" class="py-1 text-center text-xs font-light bg-red-300">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>
@endsection