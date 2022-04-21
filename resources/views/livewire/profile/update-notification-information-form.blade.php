<x-jet-action-section>
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>
    <x-slot name="content">
        <!-- This example requires Tailwind CSS v2.0+ -->
        {{-- <div class="bg-white overflow-hidden shadow rounded-lg"> --}}
            <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex items-center">
                    <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                    <button type="button"
                        class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-gray-200"
                        x-data="{ on: false }" role="switch" aria-checked="false" :aria-checked="on.toString()"
                        @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled"
                        :class="{ 'bg-indigo-600': on, 'bg-gray-200': !(on) }">
                        <span class="sr-only">Use setting</span>
                        <span aria-hidden="true"
                            class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0"
                            x-state:on="Enabled" x-state:off="Not Enabled"
                            :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
                    </button>
                    <span class="ml-3" id="annual-billing-label">
                        <span class="text-sm font-medium text-gray-900">Annual billing </span>
                        <span class="text-sm text-gray-500">(Save 10%)</span>
                    </span>
                </div>
            </div>
        {{-- </div> --}}
    </x-slot>
</x-jet-action-section>
