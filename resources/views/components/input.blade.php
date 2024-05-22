@props(['disabled' => false, 'errorName' => 'asdf'])

@php
    $errorClass = $errors->has($errorName) ? 'border-red-500' : '';
@endphp
<input style="appearance: none" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $errorClass. ' block placeholder-gray-300 w-full p-2 appearance-none text-gray-700 bg-white border border-gray-200 rounded-xl dark:bg-dark dark:text-white dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring']) !!}>
@error($errorName)<p class="text-sm text-red-500 font-medium">{{ $message }}</p>@enderror
