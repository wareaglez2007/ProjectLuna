<div x-data="Starts({count:@entangle('count'), message:''})" x-init="init()" class="px-4 py-4 mx-auto mt-3 bg-white max-w-7xl sm:px-6 lg:px-8">
    {{-- Success is as dangerous as failure. --}}

   <!-- This example requires Tailwind CSS v2.0+ -->
<div class="text-center">
    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
      <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900" x-text="message"></h3>
    <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
    <div class="mt-6">
      <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      wire:click='ShowCreateProjectForm()'
      >
        <!-- Heroicon name: solid/plus -->
        <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        New Project
      </button>
    </div>
  </div>
  @once
  <x-modal-centered-with-wide-buttons  />
  {{-- <x-modal-confirm wire:model='confirmingUserDeletion' id="confrim" /> --}}
  @endonce
</div>
<script>
    function Starts(vals){
    return{
        count: vals.count,
        message: vals.message,

        init: function(){
            if(this.count > 0){
                this.message = "You have "+this.count+" projects. Select from your projects!"
            }else{
                this.message = "No Projects";
            }

        },
    }

}
</script>
