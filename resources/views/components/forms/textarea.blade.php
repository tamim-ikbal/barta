@php
dd($attributes);
@endphp
<div>
    <textarea
        class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0{{ $class ? ' '.$class:'' }}"
        name="{{ $name }}"
    ></textarea>
    @if($showError)
        <x-forms.error :name="$name"/>
    @endif
</div>
