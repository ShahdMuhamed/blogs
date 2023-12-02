<x-layout>

    <div class="m-20">
<form  method="POST" action="/users/authenticate">
    @csrf


    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email" value="{{old('email')}}"
        />

    </div>
    @error('email')
    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

@enderror
    <div class="mb-6">
        <label
            for="password"
            class="inline-block text-lg mb-2"
        >
            Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password"
            value="{{old('password')}}"
        />
    </div>
    @error('password')
    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

@enderror

    <div class="mb-6">
        <button
            type="submit"
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            log in
        </button>
    </div>

    <div class="mt-8">
        <p>
            Don't have an account?
            <a href="/register" class="text-laravel"
                >Sign Up</a
            >
        </p>
    </div>
</form>
    </div>
</x-layout>
