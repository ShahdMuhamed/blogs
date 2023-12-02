<x-layout>


<table class="w-full table-auto rounded-sm">
    <tbody>


        @unless($blogs->isEmpty())
        @foreach ($blogs as $blog)


        <tr class="border-gray-300">
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a href="">
                   {{$blog->subject}}
                </a>
            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a
                    href="/blogs/{{$blog->id}}/edit"
                    class="text-blue-400 px-6 py-2 rounded-xl"
                    ><i
                        class="fa-solid fa-pen-to-square"
                    ></i>
                    Edit</a
                >
            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
            <form action="/blogs/{{$blog->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </button>
                </form>
            </td>
        </tr>
@endforeach
@else
<tr class="border gray-300">
<td class="px-4 py-8 border-t border-b-gray-300 text-lg">
 <p class="text-center">You don't have posts</p>
</td>
</tr>
@endunless
    </tbody>
</table>
</x-layout>
