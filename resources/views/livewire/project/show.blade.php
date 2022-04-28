<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                @livewire('project.create-project-form')

                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('project.update-project-form')
                </div>

                <x-jet-section-border />


        </div>
    </div>
</x-app-layout>
