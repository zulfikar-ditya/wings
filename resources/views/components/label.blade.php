@props(['name', 'label'])

<label for="LabelFor{{ $label ?? '' }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error($name ?? '') text-rose-500 dark:text-rose-400 @enderror">{{ $label != '' ? $label : $slot }}</label>
