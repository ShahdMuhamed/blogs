<x-layout>

    <div class="m-20">
<form  method="POST" action="/users">
    @csrf

    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">
            Name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
    name="name" value="{{old('name')}}"
        />
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

@enderror

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email" value="{{old('email')}}"
        />
        <!-- Error Example -->

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
        <label
            for="password_confirmation"
            class="inline-block text-lg mb-2"
        >
            Confirm Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password_confirmation"
            value="{{old('password_confirmation')}}"
        />
    </div>
    @error('password_confirmation')
    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

@enderror
<div class="mb-6">
<select class="form-select" aria-label="Default select example" name="role">
    {{-- <option selected>Open this select menu</option> --}}
    <option value="blog_maker" selected>Register to make new post</option>
    <option value="comment_maker">Register to make comment</option>

  </select>
  @error('password_confirmation')
  <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

@enderror
</div>
<br>

    <div class="mb-6">
        <button
            type="submit"
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Sign Up
        </button>
    </div>

    <div class="mt-8">
        <p>
            Already have an account?
            <a href="/login" class="text-laravel"
                >Login</a
            >
        </p>
    </div>
</form>
    </div>
</x-layout>
