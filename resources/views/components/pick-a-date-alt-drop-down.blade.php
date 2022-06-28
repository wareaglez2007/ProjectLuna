<div>
    @props(['options' => "{dateFormat:'Y-m-d H:i:s', altFormat:'Y-m-d H:i:s', altInput:true,enableTime: true,minDate:'today',
    } ", 'error' => null,])
    {{-- A template for none input dropwdown menu for date picker --}}
    {{-- ="{ value: @entangle($attributes->wire('model')) }" --}}
    <div wire:ignore
    wire:change='savetempduedate()'
    wire:model='temp_data.due_date'
    >
        <input x-data="selectDueDate({due_date:@entangle('temp_data.due_date')}, )"
            x-init="flatpickr($refs.input, {{ $options }} ); init()"
            x-ref="input"
            type="text"
            wire:model='temp_data.due_date'
            x-on:change="due_date = $event.target.value"
            data-input {{
            $attributes->merge(['class' => 'relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 rounded-full whitespace-nowrap bg-gray-50 hover:bg-gray-100 sm:px-3 border-0']) }}
        />
    </div>

</div>
