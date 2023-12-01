<?php
use App\Http\Controllers\PluginController;
$allPlugins = getPlugins();
$activePlugins = getActivePlugins();
$inactivePlugins = getInactivePlugins();
?>

<div>
    <div class="flex flex-col gap-8">
        {{-- Page Title --}}
        <div class="flex items-center gap-4">
            <div class="flex justify-center items-center w-8 h-8 rounded bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-4 h-4">
                    <path d="M5.625 3.75a2.625 2.625 0 100 5.25h12.75a2.625 2.625 0 000-5.25H5.625zM3.75 11.25a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75zM3 15.75a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zM3.75 18.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75z" />
                </svg>
            </div>
            <span class="flex gap-4 items-center"><h2 class="font-black text-black inline-block">Plugins</h2>
                
            </span>
        </div>

        <div class="flex flex-col gap-8">
            <div>
                <p class="font-bold text-lg">Activate or deactivate plugins</p>
            </div>

            @php
            $plugins = $allPlugins;
            @endphp

            <div>
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-700">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Plugin</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="menu_list_body">
                @foreach ($plugins as $plugin)
                    @php
                        $pluginDetails = getPluginDetails($plugin);
                    @endphp
                    <tr class="menu-tr">
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-4">
                                <p class="font-bold">{{ $plugin }}</p>
                                <div class="flex justify-start items-center gap-4">
                                    <span>
                                        @php
                                            if (pluginIsActive($plugin)) {
                                                echo '<p class="text-blue-500">Deactivate</p>';
                                            } else {
                                                echo '<p class="text-blue-500">Activate</p>';
                                            }
                                        @endphp
                                    </span>
                                    <span>
                                        @php
                                            if (!pluginIsActive($plugin)) {
                                                echo '<p class="text-red-500">Delete</p>';
                                            }
                                        @endphp
                                    </span>
                                </div>
                            </div>
                            
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-4">
                                <p>{{ substr($pluginDetails->description, 0, 192) }}</p>
                                <div class="flex justify-start items-center gap-4 flex-wrap">
                                    <span>
                                        @if ($pluginDetails->author)
                                            <p>By: <a class="text-blue-500" href="{{$pluginDetails->author_url ?? '/'}}">{{ $pluginDetails->author }}</a></p>
                                        @endif
                                    </span>
                                    <span>
                                        @if ($pluginDetails->version)
                                            <p>Version: {{ $pluginDetails->version }}</p>
                                        @endif
                                    </span>
                                    <span>
                                        @if ($pluginDetails->author)
                                            <a class="text-blue-500" href="{{$pluginDetails->author_url ?? '/'}}">Visit plugin site</a>
                                        @endif
                                    </span>

                                    @if ($pluginDetails->misc && !empty($pluginDetails->misc))
                                        <span>|</span>
                                        @foreach ($pluginDetails->misc as $misc)
                                            <span>{!! $misc !!}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>

                {{-- <div class="flex justify-center items-center gap-8 mt-8">
                    <button class="flex justify-center items-center w-12 h-12 border border-gray-500 border-dashed rounded-lg" type="button" onclick="addRow()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>

                    <button class="flex justify-center items-center px-12 h-12 bg-blue-400 text-white rounded-lg" type="submit">Done</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
