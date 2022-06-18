<div >

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
                </div>

            </div>
            <div>
                <div class="flex -mt-px divide-x divide-gray-200">
                    <div class="flex flex-1 w-0 bg-gray-100">
                        <a href="mailto:janecooper@example.com"
                            class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium text-gray-700 border border-transparent rounded-bl-lg hover:text-gray-500">
                            <!-- Heroicon name: solid/mail -->
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span class="ml-3">Email</span>
                        </a>
                    </div>
                    <div class="flex flex-1 w-0 -ml-px">
                        <a href="tel:+1-202-555-0170"
                            class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium text-gray-700 border border-transparent rounded-br-lg hover:text-gray-500">
                            <!-- Heroicon name: solid/phone -->
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span class="ml-3">Call</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>


    {{ $projects->links() }}













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
