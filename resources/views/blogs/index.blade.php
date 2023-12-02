<x-layout>




@if(count($blogs) == 0)
<p>no blogs are found</p>
@endif
<div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
@foreach ($blogs as $blog)


    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{$blog->image ? asset('storage/'.$blog->image) : asset('images/o2QzV7iRJ9SJX745YuFSKFvc78aNgZyIcJo73LkM.png')}}"
                alt=""
            />
            <div>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-user"></i> {{$blog->user->name}}
                </div>

                <h3 class="text-2xl">
                    <a href="/">{{$blog['subject']}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{$blog['content']}}</div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                    <a href="/comments?blog_id={{$blog['id']}}">show comments</a>
                    </li>

                </ul>

            </div>
        </div>
    </div>

@endforeach
</div>
<br>

    <a
    href="/blogs/create"
    class=" bg-black text-white py-2 px-5 m-10"
    >Post a blog</a>

</x-layout>
