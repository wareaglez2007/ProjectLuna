<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto max-w-7xl py-10 sm:px-6 lg:px-8">
       
            {{-- Create new Project Section --}}
            @livewire('project.create-project-form')

            <x-jet-section-border />
            {{-- Show list of projects section --}}
            <div class="mt-10 sm:mt-0">
                @livewire('project.update-project-form')
            </div>

            <x-jet-section-border />

        </div>
    </div>
</x-app-layout>
