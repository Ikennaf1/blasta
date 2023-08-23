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
                                {{-- <div class="">
                                    <textarea id="post_content" class="w-full border-gray-300 h-64 shadow" placeholder="What's on your mind?"></textarea>
                                </div> --}}
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
            <div class="flex flex-col gap-8">
                {{-- Post --}}
                <div class="flex flex-col gap-4 bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Post</p>
                        <label for="publish_id" class="px-2 py-1 bg-blue-500 text-white rounded border border-blue-600 hover:bg-blue-600" href="#">Publish</label>
                    </div>

                    <hr class="" />

                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-center">
                            <p>Status:</p>
                            <p class="font-bold">Unsaved</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p>Exported:</p>
                            <p class="font-bold">No</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <label for="save_draft_id" class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200" href="#">Save draft</label>
                        <a class="px-2 py-1 bg-red-100 rounded border border-red-300 hover:bg-red-200" href="/dashboard?route=dashboard/home">Cancel</a>
                    </div>
                </div>

                {{-- Featured image --}}
                <div class="flex flex-col gap-4 bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Featured image</p>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <hr class="" />

                    <div class="flex flex-col gap-2">
                        <label for="featured_image_id" class="flex items-center justify-center text-center border border-2 border-dashed rounded w-full h-24">
                            <p id="featured_image_container_id" class="p-2 overflow-hidden w-full h-24">No image selected. Click to upload image from file.</p>
                        </label>
                        <div class="flex justify-between items-center">
                            <label class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200">
                                Select from file
                                <input id="featured_image_id" type="file" accept="image/*" value="Select image from file" class="hidden" />
                            </label>
                            <div>
                                <button class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200">Select from gallery</button>
                            </div>
                            <script>
                                let img = document.querySelector('#featured_image_id');
                                let imgContainer = document.querySelector('#featured_image_container_id');
                                img.onchange = () => {
                                    if (img.files.length > 0) {
                                        getImgData();
                                    }
                                }
                                function getImgData() {
                                    const files = img.files[0];
                                    if (files) {
                                        const fileReader = new FileReader();
                                        fileReader.readAsDataURL(files);
                                        fileReader.addEventListener("load", function () {
                                        imgContainer.style.display = "block";
                                        imgContainer.innerHTML = '<img src="' + this.result + '" style="width: 100%; height: 100%; object-position: center; object-fit: cover;" />';
                                        });    
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>

                {{-- Keywords --}}
                {{-- <div class="flex flex-col gap-4 bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Featured image</p>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <hr class="" />

                    <div class="flex flex-col gap-2">
                        <label for="featured_image_id" class="flex items-center justify-center text-center border border-2 border-dashed rounded w-full h-24">
                            <p class="p-2">No image selected. Click to upload image from file.</p>
                        </label>
                        <div class="flex justify-between items-center">
                            <label class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200">
                                Select from file
                                <input id="featured_image_id" type="file" value="Select image from file" class="hidden" />
                            </label>
                            <div>
                                <button class="px-2 py-1 bg-blue-100 rounded border border-blue-300 hover:bg-blue-200">Select from gallery</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
