@extends('layouts.dashboard')

@section('dashboard')

@php
    $employeeRoleIds = $employee->roles->pluck('id')->toArray();
@endphp
<div class="px-12">
    <p class="text-xl font-bold">Add Employee</p>
        <div class="relative overflow-x-auto mt-4 bg-white w-full rounded-lg px-6 py-4">
            @if (\Session::has('error'))
                <div class="bg-green-300 w-full px-6 py-6 rounded-md mb-4">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <form action="/employee/update/{{ $employee->id }}" method="POST">
                @csrf
                @method('put')
            <div class="grid grid-cols-2 gap-5">
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-black">Nama Karyawan</label>
                        <input type="text" name="name" class="bg-gray-100 border-[1px] py-3 px-6  rounded-lg w-full @error('name') border-red-500 @enderror" placeholder="name is" value="{{ old('name', $employee->name) }}" />
                        @error('name')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input type="email" name="email" class="bg-gray-100 border-[1px] py-3 px-6  rounded-lg w-full  @error('email') border-red-500 @enderror" placeholder="name@example.com" value="{{ old('email', $employee->email) }}"/>
                        @error('email')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="department" class="block mb-2 text-sm font-medium text-black">Department</label>
                        <select name="department" class="bg-gray-100 border-[1px] py-3 px-6  rounded-lg w-full  @error('department') border-red-500 @enderror">
                            <option selected disabled>Pilih</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department', $employee->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="roles" class="block mb-2 text-sm font-medium text-black">Roles</label>
                        <div class="grid grid-cols-3">
                            @foreach ($roles as $role)
                                <div>
                                    <input type="checkbox" value="{{ $role->id }}" name="roles[]" {{ in_array($role->id, $employeeRoleIds) ? 'checked' : '' }}  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label class="ms-2 text-sm font-medium text-gray-900 ">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
            <div class="w-full flex border-t space-x-4 py-2">
                <a href="/employee" class="w-full"><button type="button" class="w-full bg-red-400 py-2 px-6 rounded-lg">BATAL</button></a> 
                <button type="submit" class="w-full bg-green-400 py-2 px-6 rounded-lg">SIMPAN</button>
            </div>
            </form>
        </div>

</div>
@endsection