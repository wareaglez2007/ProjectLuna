<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{$project->name}}
    </h2>
</x-slot>
{{-- Need sections to display the data and then edit or delete options --}}


<!-- This example requires Tailwind CSS v2.0+ -->
<div class="overflow-hidden bg-white rounded-lg shadow">
    <div class="px-4 py-5 sm:p-6">
        <!-- Content goes here -->
        {{$project->description}}
    </div>
</div>
