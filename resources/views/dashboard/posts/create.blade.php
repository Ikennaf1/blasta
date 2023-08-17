<div class="flex flex-col gap-8">
    <div class="flex items-top gap-8 w-full justify-between">
        <div class="flex flex-col gap-8 w-full lg:w-3/4">
            {{-- Page Title --}}
            <div class="flex items-center gap-4">
                <div class="flex justify-center items-center w-8 h-8 rounded bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                        <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                    </svg>
                </div>
                <span class="flex gap-4 items-center"><h2 class="font-black text-black inline-block">Create new post</h2></span>
            </div>

        
            <div>
                <form method="POST" action="">
                    @csrf
                    <div class="flex flex-col gap-8">
                        <div>
                            <input class="w-full border-gray-300 shadow" type="text" placeholder="Add Title" />
                        </div>

                        <div>
                            <label>
                                {{-- <div>What's on your mind?</div> --}}
                                <div>
                                    <textarea class="w-full border-gray-300 h-64 shadow" placeholder="What's on your mind?"></textarea>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full lg:w-1/4">
            Options
        </div>
    </div>
</div>
