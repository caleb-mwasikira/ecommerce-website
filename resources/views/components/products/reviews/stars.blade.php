@props(['rating', 'numOfReviews' => null])

@php
    $maxRating = 5;
@endphp

<div>
    <h3 class="sr-only">Reviews</h3>

    <div class="flex items-center">
        <div class="flex items-center">
            <!-- Active: "text-yellow-500", Default: "text-gray-200" -->
            @for ($i = 0; $i < $rating && $i < $maxRating; $i++)
                <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>
            @endfor

            @for ($i = $rating; $i < $maxRating; $i++)
                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>
            @endfor
        </div>

        <p class="sr-only">{{ $rating }} out of {{ $maxRating }} stars</p>
        <a href="#" class="ml-3 text-sm font-medium text-green-600 hover:text-green-500">
            @isset($numOfReviews)
                Based on {{ $numOfReviews }} reviews
            @endisset
        </a>
    </div>
</div>
