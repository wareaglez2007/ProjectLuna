<div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($projects as $project)
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="overflow-hidden bg-white rounded-lg shadow" wire:click='edit({{$project->id}});'>
            <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
                <h3 class="text-sm font-medium text-gray-900 truncate">{{$project->name}}</h3>
                <p class="mt-1 text-sm text-gray-500 truncate">{{$project->description}}</p>
                <span
                    class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-indigo-400 rounded-full">{{$user->name}}</span>
                <span
                    class="flex-shrink-0 inline-block px-2 py-0.5 text-white text-xs font-medium bg-slate-700 rounded-full">{{$project->due_date}}</span>
            </div>
        </div>


        @csrf

        @endforeach
    </div>
    <div class="py-2 mt-5 ">
        {{ $projects->links() }}
    </div>
    @once
    <x-modal-confirm wire:model='confirmingUserDeletion' id="confrim" />
    @endonce

    @push('scripts')
    <script>
        function show(values){
                 return{


                     init: function(){

                    }
                }
             };
        function UpdateDate(values){
            return {


                init: function(){

                }
            }
        }



    </script>

    @endpush




</div>
