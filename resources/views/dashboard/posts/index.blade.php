@php
use App\Models\User;
// use App\Models\Category;
@endphp

<div>
    <div class="flex flex-col gap-8">
        {{-- Page Title --}}
        <div class="flex items-center gap-4">
            <div class="flex justify-center items-center w-8 h-8 rounded bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                    <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                </svg>
            </div>
            <span class="flex gap-4 items-center"><h2 class="font-black text-black inline-block">{{ $subtitle }}</h2>
                <a href="/dashboard?route=posts/create">
                    <span class="inline-block px-2 py-1 shadow border bg-gray-50 border-gray-400 hover:border-gray-500 text-blue-500 hover:text-blue-600 transition duration-400">
                    Add new post
                    </span>
                </a>
            </span>
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex w-full items-center gap-4 sm:gap-8">
                <span class="text-blue-500"><a href="/dashboard?route=posts/all">All</a></span>
                <span class="text-gray-300">|</span>
                <span class="text-blue-500"><a href="/dashboard?route=posts/all/drafts">Drafts</a></span>
                <span class="text-gray-300">|</span>
                <span class="text-blue-500"><a href="/dashboard?route=posts/all/published">Published</a></span>
                <span class="text-gray-300">|</span>
                <span class="text-blue-500"><a href="/dashboard?route=posts/all/trashed">Trashed</a></span>
                <span class="justify-self-end ml-auto hidden lg:inline-block">
                    <form method="GET">
                        @csrf
                        <input type="search" placeholder="Search posts" class="shadow border-gray-300"/>
                        <input type="submit" value="Search" class="border border-gray-300 hover:border-gray-400 p-2 cursor-pointer shadow" />
                    </form>
                </span>
            </div>
            <div class="w-full overflow-x-auto border shadow">
                @if (count($posts) == 0)
                    Empty. Nothing to see here.
                @else
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Author</th>
                                {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category</th> --}}
                                {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tags</th> --}}
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date created</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Last modified</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Edit</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Delete</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Export</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($posts as $post)
                            <?php
                            $author = User::find($post->user_id)->name ?? 'Deleted user';
                            // $category = Category::find($post->category_id)->name ?? 'No category';
                            ?>
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="px-6 py-4"><a class="text-blue-500" href="/posts/{{$post->id}}">{{ $post->title }}</a></td>
                                <td class="px-6 py-4"><a class="text-blue-500" href="/users/{{$post->id}}">{{ $author }}</td>
                                {{-- <td class="px-6 py-4">{{ $post->category }}</a></td> --}}
                                {{-- <td class="px-6 py-4">{{ $post->tags }}</a></td> --}}
                                <td class="px-6 py-4">{{ $post->status }}</td>
                                <td class="px-6 py-4">{{ $post->created_at }}</td>
                                <td class="px-6 py-4">{{ $post->updated_at }}</td>
                                <td class="px-6 py-4">
                                    <a class="text-blue-500" href="/dashboard?route=posts/edit/{{$post->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <a class="text-red-500" href="/posts/delete/{{$post->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                    $href = $post->status === "draft" ? "#" : "/exports/post/$post->id";
                                    @endphp
                                    <a class="text-blue-500" href="{{$href}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>