<div>
    @props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    @once
<x-jet-dialog-modal {{ $attributes->wire('model') }}>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}

        <div class="mt-4" x-data="{}" >

        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-3"  wire:click="confirmPassword" wire:loading.attr="disabled">
            {{ $button }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
@endonce
</div>
