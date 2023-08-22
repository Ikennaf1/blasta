<script>
    tinymce.init({
        selector: '#post_content',
        plugins: 'code link autolink anchor emoticons image imagetools media lists advlist',
        toolbar: 'undo redo styles bold italic underline strikethrough forecolor backcolor numlist bullist subscript superscript code link anchor emoticons image media blockquote',
        statusbar: false
        // toolbar: 'alignleft aligncenter alignright'
    });
</script>
<div class="flex flex-col gap-8">
    <div class="flex flex-wrap items-top gap-8 w-full justify-between">
        <div class="flex flex-col gap-8 w-full lg:w-8/12">
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
                <form method="POST" action="{{ '/posts/store' }}">
                    @csrf
                    <div class="flex flex-col gap-8">
                        <div>
                            <input class="w-full border-gray-300 focus:outline-none shadow rounded-lg" type="text" placeholder="Add Title" />
                        </div>

                        <div>
                            <label>
                                {{-- <div>What's on your mind?</div> --}}
                                <div class="">
                                    <textarea id="post_content" class="w-full border-gray-300 h-64 shadow" placeholder="What's on your mind?"></textarea>
                                </div>
                            </label>
                        </div>
                        
                        <div class="hidden">
                            <input name="save_draft" id="save_draft_id" type="submit" value="Save draft" />
                            <input name="publish" id="publish_id" type="submit" value="Publish" />
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full lg:w-1/4 text-sm">
            <div class="flex flex-col gap-4 bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center">
                    <p class="font-bold">Publish</p>
                    <label for="publish_id" class="px-2 py-1 bg-blue-500 text-white rounded border border-blue-600 hover:bg-blue-600" href="#">Publish</label>
                </div>

                <hr class="" />

                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <p>Status:</p>
                        <p class="font-bold">Draft</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p>Exported:</p>
                        <p class="font-bold">No</p>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <label for="save_draft_id" class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200" href="#">Save draft</label>
                    <label for="" class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200" href="#">Preview</label>
                </div>
            </div>
        </div>
    </div>
</div>
