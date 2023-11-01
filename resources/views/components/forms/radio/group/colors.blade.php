@props(['groupName' => 'colors', 'colors' => []])

<div x-data="{ checkedRadioBtn: null }">
    <h3 class="text-sm font-medium text-gray-900">Color</h3>

    <fieldset class="mt-4">
        <legend class="sr-only">Choose a Color</legend>

        <div class="flex items-center space-x-3">
            @foreach ($colors as $color)
                <label x-on:click="checkedRadioBtn = {{ $loop->index }}"
                    x-bind:class="checkedRadioBtn == {{ $loop->index }} ? 'border-2 border-green-500' : ''"
                    class="relative flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
                    <input type="radio" name="{{ $groupName }}" value="{{ $color }}" class="sr-only"
                        aria-labelledby="{{ $groupName . '-' . $loop->index . '-label' }}">
                    <span id="{{ $groupName . '-' . $loop->index . '-label' }}"
                        class="sr-only">{{ $color }}</span>
                    <span aria-hidden="true"
                        class="h-8 w-8 {{ $color }} rounded-full border border-black border-opacity-10"></span>
                </label>
            @endforeach
        </div>
    </fieldset>
</div>
