<div>
    {{-- Update Projects form --}}



    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" x-data="show({projects:{{json_encode($projects)}} })"
        x-init="init()">

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            {{-- <template x-for="project in projects" :key="project.id"> --}}
                @foreach ($projects as $pp)
                <div
                    class="relative flex items-center px-6 py-5 space-x-3 bg-white border border-gray-300 rounded-lg shadow-sm hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="#" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true" />
                            <p class="text-sm font-medium text-gray-900">
                                {{$pp->name}}
                            </p>
                            <p class="text-sm text-gray-500 truncate">
                                {{$pp->description}}
                            </p>
                        </a>
                    </div>
                </div>

                {{--
            </template> --}}
            @endforeach
        </div>
        {{ $projects->links() }}
    </div>

    @push('scripts')
    <script>
        function show(values){
                 return{
                     projects: values.projects,

                     init: function(){
                //    this.projects = @json($projects);
                    }
                }
             };




    </script>

    @endpush




</div>
