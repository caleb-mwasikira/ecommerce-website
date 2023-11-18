@props(['reviews', 'productId'])

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
    <div class="w-full md:w-1/2">
        <!-- Review chart section -->
        <div id="review-chart">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Review Summary</h2>

            <x-products.reviews.stars :rating="$averageRating" :numOfReviews="$reviewCount" />

            @for ($i = $maxRating; $i > 0; $i--)
                @php
                    $ratingPercentage = 0;

                    if ($ratingGroup->has($i) && $reviewCount > 0) {
                        $ratingPercentage = floor(($ratingGroup->get($i) / $reviewCount) * 100);
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
        </div>

        <div id="write_review">
            <h2 class="text-lg font-bold text-gray-900 mt-6 mb-2">Write A Review</h2>
            <p class="text-md leading-4 mr-4">If you’ve used this product, share your thoughts with other customers</p>

            <!-- Write review form -->
            @auth
                <form action="{{ route('add-review') }}" method="post"
                    class="w-full mt-10 overflow-x-hidden overflow-y-auto md:inset-0">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $productId }}">
                    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">

                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">

                        <div class="min-w-0 flex-auto">
                            <p id="username" class="text-sm font-semibold leading-6 text-gray-900">
                                {{ ucwords(auth()->user()->full_name) }}
                            </p>

                            <x-products.reviews.star-input />

                            @env('local')
                            {{-- Display these errors in local/development environment only --}}
                            @error('product_id')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror

                            @error('customer_id')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                            @endenv
                        </div>
                    </div>

                    <div id="review_text" class="w-full md:w-3/4">
                        <div class="mt-4">
                            <textarea id="review_text" name="review_text" rows="5" required
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">{{ old('review_text') }}</textarea>
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
                        class="mt-4 flex w-full md:w-3/4 items-center justify-center rounded-md border border-transparent bg-green-600 px-8 py-3 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Write A Review
                    </button>
                </form>
            @endauth

            @guest
                <p class="text-md leading-4 mr-4 mt-4">
                    Please
                    <a class="font-bold inline-block no-underline hover:text-green-800 hover:underline text-green-600"
                        href="{{ route('login') }}">
                        login
                    </a>
                    to write a review
                </p>
            @endguest
        </div>
    </div>

    <!-- View reviews -->
    <div id="view_reviews" class="w-full md:w-1/2">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Customer Reviews</h2>

        @foreach ($reviews as $review)
            <div class="mb-8" x-data="{ editReview: false }">
                <div class="relative flex min-w-0 gap-x-4 w-full md:w-3/4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">

                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $review->user->full_name }}</p>
                        <x-products.reviews.stars :rating="$review->rating" />
                    </div>

                    @auth
                        <div class="absolute top-0 right-0 flex flex-row gap-x-2">
                            <!-- Delete review button -->
                            <form
                                action="{{ route('delete-review', ['product_id' => $productId, 'review_id' => $review->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')


                                @env('local')
                                {{-- Display these errors in local/development environment only --}}
                                @error('id')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                                @endenv

                                <button type="submit"
                                    class="inline-block no-underline hover:text-black hover:underline py-2 px-4">
                                    <img src="/icons/delete.svg" alt="Delete Review" srcset=""
                                        class="w-4 h-4 cursor-pointer">
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>

                <p x-show="!editReview" id="review_text" class="mt-2 w-full md:w-3/4 text-sm text-gray-600">
                    {{ $review->review_text }}
                </p>
            </div>
        @endforeach
    </div>
</div>
