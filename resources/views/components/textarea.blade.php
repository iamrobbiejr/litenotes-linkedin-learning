@props(['disabled' => false, 'field'=>'', 'value'=>''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
{{$value}}
</textarea>
@error($field)
<span class="mt-1 block text-red-600 p-2">
                            {{ $message }}</span>
@enderror
