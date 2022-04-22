<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Projects') }}
            </h2>
        </x-slot>
        <x-slot name="description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </x-slot>
        <x-slot name="slot">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">
                <div class="px-4 py-5 sm:p-6 bg-white">
                    <!-- Content goes here -->
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="text-center ">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('No projects') }}</h3>
                        <p class="mt-1 text-sm text-gray-500">{{ __('Get started by creating a new project.') }}</p>
                        <div class="mt-6">
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: solid/plus -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ __('New Project') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <x-jet-section-border/>

        </x-slot>



    </x-app-layout>

</div>
