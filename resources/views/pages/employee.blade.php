@extends('layouts.dashboard')

@section('dashboard')
<div class="px-12">
    <div class="w-full flex justify-between">
        <p class="text-xl font-bold">List Employee</p>
        <a href="/employee/create"> <button class="bg-green-400 py-2 px-4 rounded-md text-white">Add New</button></a>
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
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Department Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4 font-medium">
                                {{ $employee->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->department ? $employee->department->name : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <ul>
                                </ul>
                                @foreach ($employee->roles as $role)
                                    <li>{{ $role->name }}</li>
                                @endforeach
                            </td>
                            <td class="flex flex-col space-y-2 py-2">
                                <a href="/employee/{{ $employee->id }}/edit" class="py-1 text-xs font-light bg-yellow-100 text-center"><button >Edit</button></a>
                                <form action="/employee/{{ $employee->id }}" method="POST" class="w-full">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="py-1 text-xs font-light bg-red-300 w-full">Delete</button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>
@endsection