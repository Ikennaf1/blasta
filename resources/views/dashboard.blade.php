@php
use App\Http\Controllers\DashboardController;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight z-20">
            {{ config('app.name', 'Blasta') }}
        </h2>
    </x-slot>

    <div class="text-gray-700">
        <div class="max-w-10/12 mx-auto z-20">
                <div class="bg-white fixed mt-32 left-0 h-full z-0 w-16 md:w-[18vw] lg:w-[16vw] xl:w-[12vw] shadow-md">
                    &nbsp;
                </div>
            <div class="relative top-32">
                <div class="flex justify-between gap-12">

                    {{-- Dashboard left menu items --}}
                    <div class="px-4 sm:px-6 lg:px-8 mt-8 w-16 md:w-[18vw] lg:w-[16vw] xl:w-[12vw]">
                        <div class="fixed h-[75vh] w-12 sm:w-10 md:w-[12vw] lg:w-[12vw] xl:w-[8vw] overflow-y-auto">
                            <div class="w-full">
                                <ul class="my-4 flex flex-col gap-8">
                                    <a href="/dashboard?route=dashboard/home" class="">
                                        <div class="flex items-center justify-between hover:text-black transition ease-in-out duration-400">
                                            <li class="hidden md:inline-block">Dashboard</li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                                                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                                            </svg>                                  
                                        </div>
                                    </a>
                                    
                                    <a href="/dashboard?route=posts/all" class="">
                                        <div class="flex items-center justify-between hover:text-black transition ease-in-out duration-400">
                                            <li class="hidden md:inline-block">Posts</li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                            </svg>
                                        </div>
                                    </a>

                                    <a href="/dashboard?route=pages/all" class="">
                                        <div class="flex items-center justify-between hover:text-black transition ease-in-out duration-400">
                                            <li class="hidden md:inline-block">Pages</li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M15.75 8.25a.75.75 0 01.75.75c0 1.12-.492 2.126-1.27 2.812a.75.75 0 11-.992-1.124A2.243 2.243 0 0015 9a.75.75 0 01.75-.75z" />
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM4.575 15.6a8.25 8.25 0 009.348 4.425 1.966 1.966 0 00-1.84-1.275.983.983 0 01-.97-.822l-.073-.437c-.094-.565.25-1.11.8-1.267l.99-.282c.427-.123.783-.418.982-.816l.036-.073a1.453 1.453 0 012.328-.377L16.5 15h.628a2.25 2.25 0 011.983 1.186 8.25 8.25 0 00-6.345-12.4c.044.262.18.503.389.676l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.575 15.6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </a>

                                    <a href="#" class="">
                                        <div class="flex items-center justify-between hover:text-black transition ease-in-out duration-400">
                                            <li class="hidden md:inline-block">Media</li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                            </svg>                                                                                                                                                    
                                        </div>
                                    </a>

                                    <a href="#" class="">
                                        <div class="flex items-center justify-between hover:text-black transition ease-in-out duration-400">
                                            <li class="hidden md:inline-block">Exports</li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M19.906 9c.382 0 .749.057 1.094.162V9a3 3 0 00-3-3h-3.879a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H6a3 3 0 00-3 3v3.162A3.756 3.756 0 014.094 9h15.812zM4.094 10.5a2.25 2.25 0 00-2.227 2.568l.857 6A2.25 2.25 0 004.951 21H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-2.227-2.568H4.094z" />
                                            </svg>
                                        </div>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Dashboard contents --}}
                    <div class="mt-12 w-11/12 mr-8">
                        @if (isset($_GET['route']))
                            {!! DashboardController::RenderContent($_GET['route']) !!}
                        @endif
                        
                        {{-- Footer --}}
                        <div class="my-8 italic text-gray-400">
                            Blasta by <a target="_blank" class="font-bold" href="https://blindsjs.dev">Blindsjs</a>. Made with <a target="_blank" class="font-bold" href="https://laravel.com">Laravel</a>.
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
