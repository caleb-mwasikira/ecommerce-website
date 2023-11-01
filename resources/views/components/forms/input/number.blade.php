@props(['inputName', 'defaultValue' => null])

<div class="w-48">
    <label for="{{ $inputName }}"
        class="block text-sm font-medium leading-6 text-gray-900">{{ ucwords($inputName) }}</label>

    <div class="relative mt-1 rounded-md shadow-sm">
        <input id="{{ $inputName }}" type="number" name="{{ $inputName }}"
            value="{{ old($inputName) ?? $defaultValue }}"
            class="block w-full rounded-md border-0 py-1.5 pl-2 pr-20 text-gray-900 placeholder:text-gray-400 ring-1 ring-inset outline-none ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
            placeholder="0.00">

        <div class="absolute inset-y-0 right-0 flex items-center px-2">
            <select id="{{ $inputName . '-units' }}" name="{{ $inputName . '-units' }}"
                class="h-full rounded-md border-0 bg-transparent py-0 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm">
                <option value="inches">Inches</option>
                <option value="centimeters">cm</option>
                <option value="meters">m</option>
            </select>
        </div>
    </div>
</div>
