<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Project') }}
        </h2>
    </x-slot>


    <div class="py-10 mx-auto mt-10 bg-white max-w-7xl sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            {{-- Create new Project Section --}}
            {{-- @dump($temp_data) --}}
            @livewire('project.create-project-form', ['user' => $user, 'temp_data' => $temp_data])
        </div>
        <x-jet-section-border />

        {{-- Show list of projects section --}}
        <div class="mt-10 sm:mt-0">
            @livewire('project.update-project-form',['projects' => $projects, 'user' => $user])
        </div>
        <x-jet-section-border />

    </div>

</x-app-layout>
