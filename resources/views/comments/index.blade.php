<x-layout>

        <div class="m-20">
        <form method="POST" action="/comments"  >
            @csrf
            <div class="mb-6">

                <input
                    type="text" placeholder="type your comment here"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="comment_content"
                    {{-- value="{{old('company')}}" --}}
                />
            </div>
            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    submit
                </button>

                {{-- <a href="/" class="text-black ml-4"> Back </a> --}}
            </div>
        </form>
    </div>
        @foreach ($comments as $comment)


        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            {{-- <div class="flex"> --}}
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-user"></i> {{$comment->user->name}}
                </div>
                {{-- <div></div> --}}
                <br>
                <div class="text-xl font-bold mb-4">{{$comment['comment_content']}}</div>
            {{-- </div> --}}
             @if($comment->user->id == auth()->user()->id)
        <form action="/comments/{{$comment->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="text-red-500">
                <i class="fa-solid fa-trash"></i>
                Delete
            </button>
            </form>
            @endif
        </div>



        @endforeach


</x-layout>
