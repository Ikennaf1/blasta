<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight z-20">
            {{ config('app.name', 'Blasta') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto z-20">
                <div class="bg-white fixed  left-0 h-full z-0 w-16 sm:w-[20vw] shadow-md">
                    &nbsp;
                </div>
            <div class="flex">
                <div class="z-20 px-4 sm:px-6 lg:px-8 mt-8">
                    {{-- left menu items --}}
                    <div>
                        <ul>
                            <a href="#"><li class="my-4">Dashboard</li></a>
                            <a href="#"><li class="my-4">Dashboard</li></a>
                            <a href="#"><li class="my-4">Dashboard</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
