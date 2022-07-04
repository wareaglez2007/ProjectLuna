@props(['options' => "{dateFormat:'Y-m-d H:i:s', altFormat:'Y-m-d H:i:s', altInput:false,enableTime:
true,minDate:'today',onReady: function(){}
} ", 'error' => null,])
{{-- A template for none input dropwdown menu for date picker --}}
{{-- ="{ value: @entangle($attributes->wire('model')) }" --}}
<div
    x-data="selectDueDate({due_date:@entangle('temp_data.due_date')})"
    wire:change='$emitUp("savetempduedate")'
    wire:model='temp_data.due_date'
>

    <span
        x-ref="input"
        type="text"
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-on:change="due_date = $event.target.value"
        x-text="due_date == null ? 'Select Due Date' : due_date"
        data-input {{
            $attributes->merge(['class' => 'relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500
        rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3 border-0']) }}
        :class="(due_date != null ? 'bg-gray-100 text-gray-900' : 'bg-white')"

    >
    </span>

    @error('temp_data.due_date')
<span class="inline-flex px-2 py-2 text-sm text-red-500">{{ $message }}</span>
@enderror
</div>

