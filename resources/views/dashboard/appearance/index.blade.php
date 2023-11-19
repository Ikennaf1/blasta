@php
use App\Models\User;
@endphp

<div>
    <div class="flex flex-col gap-8">
        {{-- Page Title --}}
        <div class="flex items-center gap-4">
            <div class="flex justify-center items-center w-8 h-8 rounded bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                    <path d="M15.75 8.25a.75.75 0 01.75.75c0 1.12-.492 2.126-1.27 2.812a.75.75 0 11-.992-1.124A2.243 2.243 0 0015 9a.75.75 0 01.75-.75z" />
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM4.575 15.6a8.25 8.25 0 009.348 4.425 1.966 1.966 0 00-1.84-1.275.983.983 0 01-.97-.822l-.073-.437c-.094-.565.25-1.11.8-1.267l.99-.282c.427-.123.783-.418.982-.816l.036-.073a1.453 1.453 0 012.328-.377L16.5 15h.628a2.25 2.25 0 011.983 1.186 8.25 8.25 0 00-6.345-12.4c.044.262.18.503.389.676l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.575 15.6z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="flex gap-4 items-center"><h2 class="font-black text-black inline-block">{{ $subtitle }}</h2>
                {{-- <a href="/dashboard?route=posts/create">
                    <span class="inline-block px-2 py-1 shadow border bg-gray-50 border-gray-400 hover:border-gray-500 text-blue-500 hover:text-blue-600 transition duration-400">
                    Add new post
                    </span>
                </a> --}}
            </span>
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex w-full items-center gap-4 sm:gap-8">
                <span class="text-blue-500"><a href="/dashboard?route=pages/all">All</a></span>
                <span class="text-gray-300">|</span>
                <span class="text-blue-500"><a href="/dashboard?route=pages/all/drafts">Drafts</a></span>
                <span class="text-gray-300">|</span>
                <span class="text-blue-500"><a href="/dashboard?route=pages/all/published">Published</a></span>
                <span class="text-gray-300">|</span>
                <span class="text-blue-500"><a href="/dashboard?route=pages/all/trashed">Trashed</a></span>
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
                    @if (strpos($_SERVER["REQUEST_URI"], "trashed") === false)
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Author</th>
                                    {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Keywords</th> --}}
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
                                ?>
                                <tr class="odd:bg-white even:bg-gray-100">
                                    <td class="px-6 py-4"><a class="text-blue-500" href="/posts/{{$post->id}}">{{ $post->title }}</a></td>
                                    <td class="px-6 py-4"><a class="text-blue-500" href="/users/{{$post->id}}">{{ $author }}</td>
                                    {{-- <td class="px-6 py-4">{{ $post->keywords }}</a></td> --}}
                                    <td class="px-6 py-4">{{ ucFirst($post->status) }}</td>
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
                                        <form method="post" action="/posts/delete/{{$post->id}}">
                                            @method('delete')
                                            <input id="delete_{{$post->id}}" class="hidden" type="submit">
                                        </form>
                                        <label for="delete_{{$post->id}}" class="text-red-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </label>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                        $action = $post->status === "draft" ? "#" : "/exports/page/$post->id";
                                        @endphp
                                        @if ($post->status !== "draft")
                                            <form action="{{ $action }}" method="post">
                                                <input class="hidden" type="submit" id="export_{{$post->id}}">
                                            </form>
                                        @endif
                                        <label for="export_{{$post->id}}" class="text-blue-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                            </svg>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                    {{-- Trashed --}}
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Author</th>
                                    {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Keywords</th> --}}
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date created</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Deleted at</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Restore</th>
                                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Destroy</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach ($posts as $post)
                                <?php
                                $author = User::find($post->user_id)->name ?? 'Deleted user';
                                ?>
                                <tr class="odd:bg-white even:bg-gray-100">
                                    <td class="px-6 py-4"><a class="text-blue-500" href="/posts/{{$post->id}}">{{ $post->title }}</a></td>
                                    <td class="px-6 py-4"><a class="text-blue-500" href="/users/{{$post->id}}">{{ $author }}</td>
                                    {{-- <td class="px-6 py-4">{{ $post->keywords }}</a></td> --}}
                                    <td class="px-6 py-4">{{ $post->status }}</td>
                                    <td class="px-6 py-4">{{ $post->created_at }}</td>
                                    <td class="px-6 py-4">{{ $post->deleted_at }}</td>
                                    <td class="px-6 py-4">
                                        <form method="post" action="/posts/restore/{{$post->id}}">
                                            @method('patch')
                                            <input id="restore_{{$post->id}}" class="hidden" type="submit">
                                        </form>
                                        <label for="restore_{{$post->id}}" class="text-green-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                            </svg>
                                        </label>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form method="post" action="/posts/destroy/{{$post->id}}">
                                            @method('delete')
                                            <input id="destroy_{{$post->id}}" class="hidden" type="submit">
                                        </form>
                                        <label for="destroy_{{$post->id}}" class="text-red-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
            </div>
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>