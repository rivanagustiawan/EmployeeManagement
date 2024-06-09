@extends('layouts.dashboard')

@section('dashboard')
<div class="px-12">
    <p class="text-xl font-bold">List Employee In - Department {{ $department->name }}</p>
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
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($department->employees as $employee)
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4 font-medium">
                                {{ $employee->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->email }}
                            </td>
                            <td class="flex flex-col space-y-2 py-2">
                                <button class="py-1 text-xs font-light bg-red-300">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</div>
@endsection