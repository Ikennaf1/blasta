@php
use App\Models\User;
use App\Models\Category;
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
                <a href="#">
                    <span class="inline-block p-1 shadow border border-gray-400 hover:border-gray-500 text-blue-500 hover:text-blue-600 transition duration-400">
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
                        <input type="search" placeholder="Search posts" class="shadow border-gray-300"/>
                        <input type="submit" value="Search" class="border border-gray-300 hover:border-gray-400 p-2 cursor-pointer shadow" />
                    </form>
                </span>
            </div>
            <div class="w-full overflow-x-auto border shadow">
                @if (!$posts->hasPages())
                    Empty. Nothing to see here.
                @else
                    <table class="border-collapse bg-white text-left text-sm text-gray-700">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Author</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category</th>
                                {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tags</th> --}}
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date created</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Last modified</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($posts as $post)
                            <?php
                            $author = User::find($post->user_id)->name ?? 'Deleted user';
                            $category = Category::find($post->category_id)->name ?? 'No category';
                            ?>
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="px-6 py-4">{{ $post->title }}</td>
                                <td class="px-6 py-4">{{ $author }}</td>
                                <td class="px-6 py-4">{{ $category }}</td>
                                {{-- <td class="px-6 py-4">{{ $post->tags }}</td> --}}
                                <td class="px-6 py-4">{{ $post->status }}</td>
                                <td class="px-6 py-4">{{ $post->created_at }}</td>
                                <td class="px-6 py-4">{{ $post->updated_at }}</td>
                                <td class="px-6 py-4">Edit</td>
                                <td class="px-6 py-4">Delete</td>
                                <td class="px-6 py-4">Export</td>
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