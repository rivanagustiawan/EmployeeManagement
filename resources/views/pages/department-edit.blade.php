@extends('layouts.dashboard')

@section('dashboard')
<div class="px-12">
    <p class="text-xl font-bold">Add Department</p>
        <div class="relative overflow-x-auto mt-4 bg-white w-full rounded-lg px-6 py-4">
            @if (\Session::has('error'))
                <div class="bg-green-300 w-full px-6 py-6 rounded-md mb-4">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <form action="/department/update/{{ $department->id }}" method="POST">
            @csrf
            @method('put')
            <div class="grid grid-cols-2 gap-5">
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-black">Nama Department</label>
                        <input type="text" name="name" class="bg-gray-100 border-[1px] py-3 px-6  rounded-lg w-full @error('name') border-red-500 @enderror" placeholder="name is" value="{{ old('name', $department->name) }}" />
                        @error('name')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
            <div class="w-full flex border-t space-x-4 py-2">
                <a href="/department" class="w-full"><button type="button" class="w-full bg-red-400 py-2 px-6 rounded-lg">BATAL</button></a> 
                <button type="submit" class="w-full bg-green-400 py-2 px-6 rounded-lg">SIMPAN</button>
            </div>
            </form>
        </div>

</div>
@endsection