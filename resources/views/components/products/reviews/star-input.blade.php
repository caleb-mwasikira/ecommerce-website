@php
    $maxRating = 5;
@endphp

<div>
    <div class="flex flex-row" x-data="{ checkedRadioBtn: {{ old("rating") ?? 0 }} }">
        <!-- Radio button -->
        @for ($i = 1; $i <= $maxRating; $i++)
            <label x-on:click="checkedRadioBtn = {{ $i }}"
                class="flex flex-row items-center justify-center rounded-md text-sm font-medium cursor-pointer">
                <input type="radio" name="rating" value="{{ $i }}" class="sr-only" required>
    
                <!-- Active: "text-yellow-500", Default: "text-gray-200" -->
                <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    x-bind:class="checkedRadioBtn >= {{ $i }} ? 'text-yellow-500' : 'text-gray-200'"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>
            </label>
        @endfor
    </div>
    
    @error('rating')
        <div class="text-xs text-red-500">{{ $message }}</div>
    @enderror
</div>
