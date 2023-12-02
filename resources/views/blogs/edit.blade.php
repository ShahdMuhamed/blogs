<x-layout>

        <div class="m-20">
            <form method="POST" action="/blogs/{{$blog-> id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="subject"
                        class="inline-block text-lg mb-2"
                        >Subject</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="subject" value="{{old('subject')}}"
                    />
                </div>
                @error('subject')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

            @enderror
         <div class="mb-6">
                <label
                    for="content"
                    class="inline-block text-lg mb-2"
                >
                   your post
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="content"
                    rows="10" value="{{old('content')}}"
                ></textarea>
            </div>
            @error('content')
            <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

        @enderror
                <div class="mb-6">
                    <label for="image" class="inline-block text-lg mb-2">
                        image
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                    />
                    <img
                    class="w-48 mr-6 mb-6"
                    src="{{$blog->image ? asset('storage/'.$blog->image): asset('images/no-image.png') }}"
                    alt=""
                />
                </div>

                @error('image')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>

            @enderror




                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        edit post
                    </button>

                    <a href="/blogs" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>


    </x-layout>
