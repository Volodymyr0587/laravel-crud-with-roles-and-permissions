@props(['backRoute', 'resourceName'])

<div class="mb-6">
    @if(request()->has('search'))
        <div class="flex flex-col">
            <div class="mb-2">
                {{ __('Search results for') }}
                <span class="italic underline underline-offset-8 decoration-4 decoration-blue-500">
                    {{ request()->query('search') }}
                </span>
            </div>
            <a href="{{ route($backRoute) }}" class="inline-flex items-center w-max space-x-2 text-sm text-blue-500 hover:text-blue-300 dark:text-blue-400 dark:hover:text-blue-500">
                <svg fill="currentColor" height="20px" width="20px" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                    xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g transform="translate(1 1)">
                            <g>
                                <g>
                                    <path
                                        d="M297.667,203.838H203.8v-85.333c0-3.413-1.707-5.973-5.12-7.68c-2.56-1.707-5.973-0.853-8.533,0.853L2.413,248.212 C0.707,249.919-1,252.479-1,255.038c0,2.56,1.707,5.12,3.413,6.827l187.733,136.533c1.707,0.853,3.413,1.707,5.12,1.707 s2.56,0,4.267-0.853c2.56-1.707,4.267-4.267,4.267-7.68v-85.333h93.867c5.12,0,8.533-3.413,8.533-8.533v-85.333 C306.2,207.252,302.787,203.838,297.667,203.838z M289.133,289.172h-93.867c-5.12,0-8.533,3.413-8.533,8.533v76.8L22.04,255.038 l164.693-119.467v76.8c0,5.12,3.413,8.533,8.533,8.533h93.867V289.172z">
                                    </path>
                                    <path
                                        d="M348.867,203.838c-14.507,0-25.6,11.093-25.6,25.6v51.2c0,14.507,11.093,25.6,25.6,25.6c14.507,0,25.6-11.093,25.6-25.6 v-51.2C374.467,214.932,363.373,203.838,348.867,203.838z M357.4,280.638c0,5.12-3.413,8.533-8.533,8.533 s-8.533-3.413-8.533-8.533v-51.2c0-5.12,3.413-8.533,8.533-8.533s8.533,3.413,8.533,8.533V280.638z">
                                    </path>
                                    <path
                                        d="M417.133,203.838c-14.507,0-25.6,11.093-25.6,25.6v51.2c0,14.507,11.093,25.6,25.6,25.6s25.6-11.093,25.6-25.6v-51.2 C442.733,214.932,431.64,203.838,417.133,203.838z M425.667,280.638c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533 v-51.2c0-5.12,3.413-8.533,8.533-8.533s8.533,3.413,8.533,8.533V280.638z">
                                    </path>
                                    <path
                                        d="M485.4,203.838c-14.507,0-25.6,11.093-25.6,25.6v51.2c0,14.507,11.093,25.6,25.6,25.6s25.6-11.093,25.6-25.6v-51.2 C511,214.932,499.907,203.838,485.4,203.838z M493.933,280.638c0,5.12-3.413,8.533-8.533,8.533s-8.533-3.413-8.533-8.533v-51.2 c0-5.12,3.413-8.533,8.533-8.533s8.533,3.413,8.533,8.533V280.638z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <span>{{ __('Back to all :resource page', ['resource' => $resourceName]) }}</span>
            </a>
        </div>
    @else
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 capitalize">{{ $resourceName }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('All available :resource', ['resource' => $resourceName]) }}</p>
    @endif
</div>

