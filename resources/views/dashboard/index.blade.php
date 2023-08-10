<div>
    <div class="flex flex-col gap-8">
        {{-- Page Title --}}
        <div class="flex items-center gap-4">
            <div class="flex justify-center items-center w-8 h-8 rounded bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                    <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
            </div>
            <h2 class="font-black text-black">Dashboard Home</h2>
        </div>

        {{-- Overview --}}
        <div class="">
            <div class="flex flex-col gap-4">
                <div>
                    <h3 class="font-bold inline-block">Overview</h3>
                </div>
                <div class="flex w-full justify-between flex-wrap gap-4 text-white">
                    <div class="flex flex-col justify-between gap-4 p-8 w-full sm:w-56 md:w-64 lg:w-[30%] bg-gradient-to-br from-red-400 via-purple-400 to-orange-400 shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-xl">Posts</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 01.968-.432l5.942 2.28a.75.75 0 01.431.97l-2.28 5.941a.75.75 0 11-1.4-.537l1.63-4.251-1.086.483a11.2 11.2 0 00-5.45 5.174.75.75 0 01-1.199.19L9 12.31l-6.22 6.22a.75.75 0 11-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l3.606 3.605a12.694 12.694 0 015.68-4.973l1.086-.484-4.251-1.631a.75.75 0 01-.432-.97z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-7xl font-bold">
                            {{ $postCount }}
                        </div>
                    </div>

                    <div class="flex flex-col justify-between gap-4 p-8 w-full sm:w-56 md:w-64 lg:w-[30%] bg-gradient-to-br from-blue-400 via-cyan-400 to-green-400 shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-xl">Pages</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 01.968-.432l5.942 2.28a.75.75 0 01.431.97l-2.28 5.941a.75.75 0 11-1.4-.537l1.63-4.251-1.086.483a11.2 11.2 0 00-5.45 5.174.75.75 0 01-1.199.19L9 12.31l-6.22 6.22a.75.75 0 11-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l3.606 3.605a12.694 12.694 0 015.68-4.973l1.086-.484-4.251-1.631a.75.75 0 01-.432-.97z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-7xl font-bold">
                            {{ $pageCount }}
                        </div>
                    </div>

                    <div class="flex flex-col justify-between gap-4 p-8 w-full sm:w-56 md:w-64 lg:w-[30%] bg-gradient-to-br from-lime-400 via-fuschia-400 to-pink-400 shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-xl">Exports</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 01.968-.432l5.942 2.28a.75.75 0 01.431.97l-2.28 5.941a.75.75 0 11-1.4-.537l1.63-4.251-1.086.483a11.2 11.2 0 00-5.45 5.174.75.75 0 01-1.199.19L9 12.31l-6.22 6.22a.75.75 0 11-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l3.606 3.605a12.694 12.694 0 015.68-4.973l1.086-.484-4.251-1.631a.75.75 0 01-.432-.97z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-7xl font-bold">
                            {{ $exportCount }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Posts --}}
        <div class="flex flex-col gap-4 p-8 bg-white shadow">
            <span><h3 class="font-bold inline-block">Recent posts</h3> :: <a class="underline" href="#">See all posts</a></span>
            <div class="flex flex-wrap gap-4">
            @foreach ($posts as $post)
                <div class="border w-full sm:w-[46%] md:w-56 shadow">
                    <div class="w-full h-full flex flex-col gap-2">
                        {{-- Post featured image --}}
                        <div class="w-full h-32 sm:h-32 md:h-40 overflow-hidden">
                            <img src="<?= $post->featured_image != null
                                            ? asset('images/' . $post->featured_image)
                                            : asset('images/post_default_image.png') ?>"
                            style="width: 100%; height: 100%; object-position: center; object-fit: cover;" />
                        </div>

                        {{-- Post body --}}
                        <div class="px-4 flex flex-col gap-2">
                            {{-- Post title --}}
                            <div class="text-sm font-bold">
                                <p>{{ $post->title }}</p>
                            </div>

                            {{-- Post actions --}}
                            <div class="flex gap-4 flex-wrap text-sm pb-4">
                                <span>
                                    Status: {{ $post->status }} | 
                                    <?= $post->status === 'published'
                                        ? '<a target="_blank" class="font-bold text-xs text-blue-500" href="/posts/'.$post->id.'">View post</a>'
                                        : '<a class="font-bold text-xs text-blue-500" href="/posts/edit/'.$post->id.'">Edit post</a>'
                                    ?>
                                </span>

                                {{-- Some action icons --}}
                                {{-- <div class="flex justify-between items-center">
                                    <span>
                                        
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        {{-- Footer --}}
        <div class="italic text-gray-400">
            Blasta by <a target="_blank" class="font-bold" href="https://blindsjs.dev">Blindsjs</a>. Made with <a target="_blank" class="font-bold" href="https://laravel.com">Laravel</a>.
        </div>
        <div></div>
    </div>
</div>