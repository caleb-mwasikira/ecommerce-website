@props(['groupName', 'allOptions', 'availableOptions'])

@php
    $missingOptions = array_diff($allOptions, $availableOptions);
@endphp

<div x-data="{ checkedRadioBtn: null }" class="mt-10">
    <div class="flex items-center justify-between">
        <h3 class="text-sm font-medium text-gray-900">{{ ucwords($groupName) }}</h3>

        <a href="#" class="text-sm font-medium text-green-600 hover:text-green-500">
            Guide
        </a>
    </div>


    <fieldset class="mt-4">
        <legend class="sr-only">Choose a {{ ucwords($groupName) }}</legend>

        <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
            <!-- Disabled radio button -->
            @foreach ($missingOptions as $value)
                <label
                    class="group relative flex items-center justify-center rounded-md border py-2 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-not-allowed bg-gray-50 text-gray-200">
                    <input type="radio" name="{{ $groupName }}" value="{{ $value }}" disabled
                        class="sr-only" aria-labelledby="{{ $groupName . $loop->index . '-label' }}">
                    <span id="{{ $groupName . $loop->index . '-label' }}">{{ $value }}</span>

                    <span aria-hidden="true"
                        class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                        <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100"
                            preserveAspectRatio="none" stroke="currentColor">
                            <line x1="0" y1="100" x2="100" y2="0"
                                vector-effect="non-scaling-stroke" />
                        </svg>
                    </span>
                </label>
            @endforeach

            <!-- Radio button -->
            @foreach ($availableOptions as $value)
                <label x-on:click="checkedRadioBtn = {{ $loop->index }}"
                    x-bind:class="checkedRadioBtn == {{ $loop->index }} ? 'border-4 border-green-500' : ''"
                    class="group relative flex items-center justify-center rounded-md border py-2 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="{{ $groupName }}" value="{{ $value }}"
                        class="sr-only" aria-labelledby="{{ $groupName . $loop->index . '-label' }}">
                    <span id="{{ $groupName . $loop->index . '-label' }}">{{ ucwords($value) }}</span>

                    <span class="absolute -inset-px rounded-md" aria-hidden="true"></span>
                </label>
            @endforeach
        </div>
    </fieldset>
</div>
