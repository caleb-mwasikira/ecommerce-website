@props(['reviews', 'productId' => null])

@php
    $maxRating = 5;
    $reviews = collect($reviews);
    $reviewCount = $reviews->count();
    $ratingGroup = $reviews->groupBy('rating')->map->count();

    $totalRating = $ratingGroup->reduce(function ($carry, $item, $key) {
        return $carry + $item * $key;
    });

    $averageRating = $reviewCount > 0 ? floor($totalRating / $reviewCount) : 0;
@endphp

<div class="flex flex-col md:flex-row gap-y-16 items-start justify-between mt-10 mx-8">
    <div id="review-summary-chart" class="w-full md:w-1/2">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Customer Reviews</h2>

        <x-products.reviews.stars :rating="$averageRating" :numOfReviews="$reviewCount" />

        @for ($i = $maxRating; $i > 0; $i--)
            @php
                $ratingPercentage = 0;

                if ($ratingGroup->has($i) && $reviewCount > 0) {
                    $ratingPercentage = ($ratingGroup->get($i) / $reviewCount) * 100;
                }

                $isRated = $ratingPercentage > 0;
            @endphp

            <!-- Rating progress bar -->
            <div class="flex items-center gap-x-4 my-2">
                <div class="flex justify-between mb-1">
                    <span class="flex items-center text-base font-medium text-gray-700 dark:text-white">
                        {{ $i }}

                        <svg class="{{ $isRated ? 'text-yellow-400' : 'text-gray-200' }} h-5 w-5 ml-2 flex-shrink-0"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>

                <div class="w-1/2 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="{{ $isRated ? 'bg-yellow-400' : '' }} h-2.5 rounded-full"
                        style="width: {{ $ratingPercentage }}%"></div>
                </div>

                <span
                    class="text-sm font-medium text-gray-700 dark:text-white text-right">{{ $ratingPercentage }}%</span>
            </div>
        @endfor

        <h2 class="text-lg font-bold text-gray-900 mt-6 mb-2">Share your thoughts</h2>
        <p class="text-md leading-4 mr-4">If you’ve used this product, share your thoughts with other customers</p>

        <button type="button" data-modal-target="write-review-modal" data-modal-toggle="write-review-modal"
            class="mt-10 flex w-full md:w-3/4 items-center justify-center rounded-md border border-transparent bg-green-600 px-8 py-3 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Write A Review
        </button>

        <!-- Write a review modal -->
        <div id="write-review-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="write-review-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Write A Review</h3>

                        <!-- Write a review form -->
                        <form action="{{ route('add_review', ['id' => $productId]) }}" method="post" class="space-y-6">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $productId }}">
                            <input type="hidden" name="customer_id" value="1">
                            <input type="hidden" name="rating" value="3">

                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">

                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                                    <x-products.reviews.stars :rating="0" />

                                    @error('product_id')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror

                                    @error('customer_id')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror

                                    @error('rating')
                                        <div class="text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div id="review_text" class="w-full">
                                <div class="mt-4">
                                    <textarea id="review_text" name="review_text" rows="5"
                                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"></textarea>
                                </div>

                                @error('review_text')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror

                                @if (!$errors->has('review_text'))
                                    <p class="mt-1 text-sm leading-6 text-gray-600">
                                        Write a review about the product
                                    </p>
                                @endif

                            </div>

                            <button type="submit"
                                class="mt-2 flex w-32 items-center justify-center self-end rounded-md border border-transparent bg-green-600 px-6 py-2 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="review-section" class="w-full md:w-1/2">
        @foreach ($reviews as $review)
            <div class="mb-8">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $review->user->full_name }}</p>
                        <x-products.reviews.stars :rating="$review->rating" />
                    </div>
                </div>

                <p id="review_text" class="mt-2 text-sm text-gray-600">
                    {{ $review->review_text }}
                </p>
            </div>
        @endforeach
    </div>
</div>
