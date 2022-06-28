<div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($projects as $project)
        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
            <div class="flex items-center justify-between w-full p-6 space-x-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-sm font-medium text-gray-900 truncate">{{$project->name}}</h3>
                        <span
                            class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{$project->phase}}</span>

                    </div>

                    <p class="mt-1 text-sm text-gray-500 truncate">{{$project->description}}</p>
                    <span
                        class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-indigo-400 rounded-full">{{$user->name}}</span>
                        <span
                        class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-slate-700 rounded-full">{{$project->due_date}}</span>
                </div>

            </div>
            <div>
                <div class="flex -mt-px divide-x divide-gray-200">
                    <div class="flex flex-1 w-0 ">
                        <a href="mailto:janecooper@example.com"
                            class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium text-red-700 border border-transparent rounded-bl-lg hover:text-red-500">
                            <!-- Heroicon name: solid/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3">Delete</span>
                        </a>
                    </div>
                    <div class="flex flex-1 w-0 -ml-px">
                        <a href="tel:+1-202-555-0170"
                            class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium border border-transparent rounded-br-lg text-slate-800 hover:text-slate-500">
                            <!-- Heroicon name: solid/phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            <span class="ml-3">Edit</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

    <div class="py-2 mt-5 ">
        {{ $projects->links() }}
    </div>














    @push('scripts')
    <script>
        function show(values){
                 return{


                     init: function(){

                    }
                }
             };




    </script>

    @endpush




</div>
