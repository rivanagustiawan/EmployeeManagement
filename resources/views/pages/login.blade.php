<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>
<body>
    <div class="flex w-full items-center justify-center bg-green-200 h-screen">
        
        <form class="max-w-lg mx-auto bg-white px-12 py-6 rounded-lg shadow-lg" action="/login" method="POST">
            @csrf
            @if (\Session::has('loginError'))
                <div class="bg-red-300 w-full px-6 py-6 rounded-md mb-4">
                    {!! \Session::get('loginError') !!}
                </div>
            @endif
            <p class="text-center font-medium mb-4">LOGIN</p>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your Username</label>
                <input type="text" name="username" class="bg-gray-100 border-[1px] py-3 px-6  rounded-lg w-full @error('username') border-red-500 @enderror" placeholder="username" value="{{ old('username') }}" />
                @error('username')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>                        
                <input type="password" name="password" class="bg-gray-100 border-[1px] py-3 px-6  rounded-lg w-full @error('password') border-red-500 @enderror" />
                @error('password')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white w-full bg-green-800 py-2 px-4 rounded-md">Login</button>
        </form>
    </div>
</body>
</html>