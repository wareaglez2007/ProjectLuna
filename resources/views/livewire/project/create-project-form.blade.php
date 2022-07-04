<div>
    {{-- Project form goes here --}}
    <form action="#" class="relative" wire:submit.prevent="save()">
        @csrf
        <div x-data="

        MainForm({

            {{-- project:@entangle('project.name'),
            project_description:$persist(@entangle('project.description')),
            user_storage:$persist({{$user}}),
            temp_data:@entangle('project.name') --}}

        })
        " x-init="init()"
            class="overflow-hidden border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
            <label for="title" class="sr-only">Title</label>
            <input type="hidden" name="user" wire:model="user" />
            <input type="text" name="name" id="name" wire:model="temp_data.name"
                class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0"
                placeholder="Project Name (i.e. Project address)" wire:keyup='savetemp()'>
            @error('temp_data.name') <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
            @enderror


            <label for="description" class="sr-only">Description</label>
            <textarea rows="2" name="description" id="description" wire:model="temp_data.description"
                class="block w-full py-0 placeholder-gray-500 border-0 resize-none focus:ring-0 sm:text-sm"
                placeholder="Write a description..." wire:keyup='savetemp()'></textarea>
            @error('temp_data.description')
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
                        project_phase:@entangle('temp_data.phase')


                    })" x-init="init()">

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
                            wire:model="temp_data.phase" wire:click="savetempPhase()" x-cloak>
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
                    @error('temp_data.phase')
                    <span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- END of Project Phase --}}
                {{-- Project Status --}}
                <div>
                    <x-pick-labes wire:model="temp_data.priority" id="label" />
                </div>
                {{-- End of Project Status --}}
                {{-- Project Assignment --}}
                <div>
                    <x-pick-a-date-alt-drop-down wire:model='temp_data.due_date' id="due_date" />
                </div>
                {{--END of Project Assignment --}}

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

                            <button wire:click.prevent="$emitSelf('reset-form')"
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

            console.log(this.data);
        localStorage.clear();
    });
        Livewire.on('reset-form', local_storage => {

        localStorage.clear();
    });
    Livewire.on('savetempPhase', project_phase => {
        console.log(project_phase);
    });
    Livewire.on('savetempdudate', due_date => {
        console.log(due_date);
    });

    </script>

    <script>
        function MainForm(vals){
        return{
            project: vals.project,
            project_description: vals.project_description,
            user_storage:vals.user_storage,
            temp_data:vals.temp_data,
            init: function(){
                if(this.user_storage === {{$user}}){
                   // localStorage.setItem('_x_user_storage', {{$user}});
                }else{
                    localStorage.clear();
                   // localStorage.setItem('_x_user_storage', {{$user}});

                }
}
        }
    }
        function select(values){
                 return{
                     phases: values.phases,
                     selectedphase: values.selectedphase ?? null,
                     project_phase: values.project_phase ?? "Select Phase",
                     phaseactiveIndex: values.phaseactiveIndex,
                     init_class: this.init_class,
                     persist_class: this.persist_class,
                     open: values.open ?? false,
                     init: function(){

                      //  $set('project_phase', 'Not Selected')
                    }
                }
             };
             //Due date functions
        function selectDueDate(values){
            return{
            due_date: values.due_date ?? 'Select Due Date',

            init: function(){
              //  this.due_date = "Select Due Date";
                console.log(this.due_date)
             }
            }
        };
        //Label functions
        function selectLabel(values){
            return{
            open: values.open ?? false,
            selectIndex: values.selectIndex,
            activeIndex: values.activeIndex,
            labels: values.labels,
            p_label:values.p_label ?? "Select Category",
            selectlabel:values.selectlabel,
            init: function(){
              //  this.p_label = "Select Category";
                console.log(this.p_label);
            }
         }
        };


    </script>


    @endpush

</div>
