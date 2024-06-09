@extends('layouts.dashboard')

@section('dashboard')
<div class="px-12">
    <p class="text-xl font-bold">List Employee</p>
        <div class="relative overflow-x-auto mt-4">
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
                                {{ $employee->department->name }}
                            </td>
                            <td class="px-6 py-4">
                                <ul>
                                </ul>
                                @foreach ($employee->roles as $role)
                                    <li>{{ $role->name }}</li>
                                @endforeach
                            </td>
                            <td class="flex flex-col space-y-2 py-2">
                                <button class="py-1 text-xs font-light bg-yellow-100">Edit</button>
                                <button class="py-1 text-xs font-light bg-red-300">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>
@endsection