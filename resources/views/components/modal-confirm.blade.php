<div x-data="{
    project_name:@entangle('project.name'),
    project_description:@entangle('project.description'),
    project_id:@entangle('project.id')
}">
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <x-jet-confirmation-modal wire:model='confirmingUserDeletion'>
        <x-slot name="title">

                <span x-text='project_name'></span>
                <span x-text='project_id' class="text-5xl text-blue-90"></span>
        </x-slot>

        <x-slot name="content">
            <span x-text='project_description'></span>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="show_item()" wire:loading.attr="disabled">
                View Project Details
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
