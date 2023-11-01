@props(['label', 'inputName', 'value', 'helperText' => null, 'isChecked' => false])

<div class="flex my-4">
    <div class="flex items-center h-5">
        <input id="helper-radio" aria-describedby="helper-radio-text" type="radio" value="{{ $value }}"
            name="{{ $inputName }}" @checked($isChecked)
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    </div>

    <div class="ml-2 text-sm">
        <label for="helper-radio" class="font-medium text-gray-900 dark:text-gray-300">
            {{ $label }}
        </label>

        <p class="text-xs font-normal text-gray-500 dark:text-gray-300">
            {!! $helperText ?? '' !!}
        </p>
    </div>
</div>
