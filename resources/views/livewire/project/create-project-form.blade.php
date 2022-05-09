<div>
    {{-- Project form goes here --}}
    <form action="#" class="relative" wire:submit.prevent="save()">
        <div x-data="
        {
            project:$persist(@entangle('project.name')),
            project_description:$persist(@entangle('project.description')),


        }
        "
            class="overflow-hidden border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
            <label for="title" class="sr-only">Title</label>

            <input type="text" name="name" id="name" wire:model="project.name"
                class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0"
                placeholder="Project Name (i.e. Project address)">
            @error('project.name') <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
            @enderror


            <label for="description" class="sr-only">Description</label>
            <textarea rows="2" name="description" id="description" wire:model="project.description"
                class="block w-full py-0 placeholder-gray-500 border-0 resize-none focus:ring-0 sm:text-sm"
                placeholder="Write a description..."></textarea>
            @error('project.description')
            <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
            @enderror
            <!-- Spacer element to match the height of the toolbar -->
            <div aria-hidden="true">
                <div class="py-2">
                    <div class="h-9"></div>
                </div>
                <div class="h-px"></div>
                <div class="py-2">
                    <div class="py-px">
                        <div class="h-9"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 inset-x-px">
            {{-- Project Phase --}}
            <div class="flex justify-end px-2 py-2 space-x-2 flex-nowrap sm:px-3">
                <div class="flex-shrink-0">
                    {{-- <label id="listbox-label" class="sr-only"> Assign </label> --}}
                    <div class="relative" x-data="select({ open: false, selectedIndex: 0, phaseactiveIndex: '',
                    phases:[

                        {id:1,name:'Not Started'},
                        {id:2,name:'In Progress'},
                        {id:3,name:'On Hold'},
                        {id:4,name:'Pending Customer'},
                        {id:5,name:'Pending Supplier'},
                        {id:6,name:'Pending Other'},
                        {id:7,name: 'Completed'},
                        {id:8,name:'Cancelled'},
                        {id:9,name:'Resolved'},
                        {id:10,name:'Delayed'},
                        {id:11,name:'On Time'}],
                        selectedphase: null,
                        phase: '',
                        project_phase:$persist(@entangle('project.phase')),
                        init_class: 'relative px-3 py-2 bg-white cursor-default select-none',
                        persist_class: 'relative px-3 py-2 bg-gray-100 cursor-default select-none',

                    })" x-init="init()">
                        @error('project.phase')
                        <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        <button x-on:click="open = ! open" type="button"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" x-ref="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>

                            <span class="hidden truncate sm:ml-2 sm:block"
                                :class="{ '': selectedphase === null, 'text-gray-900': !(selectedphase === null) }"
                                x-text="project_phase != null ? project_phase : (selectedphase === null ? 'Select Phase' : selectedphase) "></span>

                        </button>


                        <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-0" x-show="open" @click.outside="open = false"
                            wire:model="project.phase" x-cloak>
                            <template x-for="phaseitem in phases" :key="phaseitem.id">

                                <li class="relative px-3 py-2 cursor-default select-none" id="listbox-option-0"
                                    role="option" x-data
                                    @click="$dispatch('input', phaseitem.name), selectedphase='Select Phase', open=false"
                                    @mouseenter="phaseactiveIndex = phaseitem.name"
                                    @mouseleave="phaseactiveIndex = phaseactiveIndex"
                                    :class="(project_phase != null ? (phaseitem.name === project_phase ? 'bg-gray-100' : 'bg-white') : (phaseactiveIndex === phaseitem.name) ? 'bg-gray-100' : 'bg-white')">

                                    <div class="flex items-center">

                                        <span class="block ml-3 font-medium truncate" x-text="phaseitem.name">

                                        </span>

                                    </div>
                                </li>
                            </template>

                        </ul>

                    </div>
                </div>
                {{-- END of Project Phase --}}
                {{-- Project Status --}}
                <div class="flex-shrink-0">
                    <label id="listbox-label" class="sr-only"> Add a label </label>
                    <div class="relative" x-data="{ open: false, selectedIndex: 0, activeIndex: 0, selectphase:'' }">
                        <button type="button" x-on:click="open = ! open" x-cloak
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">

                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <!-- Selected: "text-gray-900" -->
                            <span class="hidden truncate sm:ml-2 sm:block"> Label </span>
                        </button>


                        <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-0" x-show="open" x-cloak
                            @click.outside="open = false">


                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-0"
                                role="option" id="listbox-option-0" role="option" @click="choose(0)"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'bg-gray-100': activeIndex === 0, 'bg-white': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> Unlabelled </span>
                                </div>
                            </li>



                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-1"
                                role="option" id="listbox-option-0" role="option" @click="choose(0)"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'bg-gray-100': activeIndex === 1, 'bg-white': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> Engineering </span>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>
                </div>
                {{-- End of Project Status --}}
                {{-- Project Assignment --}}
                <div class="flex-shrink-0">
                    <label id="listbox-label" class="sr-only"> Add a due date </label>
                    <div class="relative" x-data="{ open: false, selectedIndex: 0, activeIndex: 0 }">
                        <button type="button" x-on:click="open = ! open" x-cloak
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3"
                            aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-300 sm:-ml-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <!-- Selected: "text-gray-900" -->
                            <span class="hidden truncate sm:ml-2 sm:block"> Due date </span>
                        </button>
                        <ul x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute right-0 z-10 py-3 mt-1 overflow-auto text-base bg-white rounded-lg shadow w-52 max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                            aria-activedescendant="listbox-option-0" x-show="open" x-cloak
                            @click.outside="open = false">

                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-0"
                                role="option" id="listbox-option-0" role="option" @click="choose(0)"
                                @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null"
                                :class="{ 'bg-gray-100': activeIndex === 0, 'bg-white': !(activeIndex === 0) }">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> No due date </span>
                                </div>
                            </li>

                            <li class="relative px-3 py-2 bg-white cursor-default select-none" id="listbox-option-1"
                                role="option" id="listbox-option-0" role="option" @click="choose(0)"
                                @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null"
                                :class="{ 'bg-gray-100': activeIndex === 1, 'bg-white': !(activeIndex === 1) }">
                                <div class="flex items-center">
                                    <span class="block font-medium truncate"> Today </span>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>
                </div>
                {{--END of Project Assignment --}}
                <div class="flex-shrink-0">
                    <x-pick-a-date wire:model="date" id="date"
                        class="block mb-4 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                </div>
            </div>
            <div class="flex items-center justify-between px-2 py-2 space-x-3 border-t border-gray-200 sm:px-3">
                <div class="flex">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 -my-2 -ml-2 text-left text-gray-400 rounded-full group">
                        <!-- Heroicon name: solid/paper-clip -->
                        <svg class="w-5 h-5 mr-2 -ml-1 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm italic text-gray-500 group-hover:text-gray-600">Attach a file</span>
                    </button>
                </div>
                {{-- <div class="flex-shrink-0">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Create
                    </button>
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>
                </div> --}}
                <div class="flex justify-end px-2 py-2 space-x-2 flex-nowrap sm:px-3">
                    <div class="flex-shrink-0">
                        <div class="inline-flex items-center" x-cloak>

                            <x-jet-action-message class="mr-3" on="reset">
                                {{ __('Done!') }}
                            </x-jet-action-message>

                            <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="inline-flex items-center" x-cloak>

                            <x-jet-action-message class="mr-3" on="saved">
                                {{ __('Saved.') }}
                            </x-jet-action-message>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        Livewire.on('saved', data => {
       // alert('A post was added with the id of: ');
        localStorage.clear();


             });
             function select(values){

                 return{
                     phases: values.phases,
                     selectedphase: values.selectedphase ?? null,
                     project_phase: values.project_phase,
                     phaseactiveIndex: values.phaseactiveIndex,
                     init_class: this.init_class,
                     persist_class: this.persist_class,
                     open: values.open ?? false,
                     init: function(){
                      //  $set('project_phase', 'Not Selected')
                    }
                }
             }


    </script>

    @endpush


</div>
