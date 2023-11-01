@props(['product'])
@section('title', 'View Product')

<x-layout>
    <div class="bg-white pt-6">
        <x-breadcrumb :endpoint="$product->category->name" :links="[
            'Home' => 'home',
            'Products' => 'view-all-products',
        ]" />

        <!-- Image gallery -->
        <x-products.image-gallery :images="$product->media" />

        <!-- Product info -->
        <div class="mx-8 py-10 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:py-18">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-2xl">{{ $product->name }}</h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">£ {{ $product->price }}</p>

                <form action="" method="post" class="mt-10">
                    <x-forms.radio.group.colors :colors="['bg-white', 'bg-gray-500', 'bg-black']" />
                    <x-forms.radio.group.large-button groupName="size" :allOptions="['XXS', '3XL', '2XL', 'XL', 'L', 'M', 'S']" :availableOptions="['3XL', '2XL', 'XL', 'L', 'M', 'S']" />

                    <button type="submit"
                        class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 px-8 py-3 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Add to bag
                    </button>
                </form>
            </div>

            @isset($product->description)
                <!-- Description and details -->
                <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                    <div>
                        <h2 class="text-md font-medium text-gray-900 sr-only">Description</h2>

                        <div class="space-y-6 mt-4">
                            <p class="text-base text-gray-600">{{ $product->description?->body }}</p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h2 class="text-md font-medium text-gray-900">Highlights</h2>

                        <div class="mt-4">
                            @php
                                $description = collect($product->description)
                                    ->only(['size', 'gender', 'color', 'material', 'care_instructions', 'brand', 'country_of_origin'])
                                    ->reject(function ($value, $key) {
                                        return empty($value);
                                    })
                                    ->all();
                            @endphp

                            @foreach ($description as $key => $value)
                                <div class="mb-2">
                                    <p class="flex text-sm text-gray-600">
                                        <span
                                            class="w-1/2 md:w-1/4 font-bold">{{ ucwords(str_replace('_', ' ', $key)) }}:</span>
                                        <span class="w-1/2 md:w-3/4">{{ ucwords($value) }}</span>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>

    <x-products.reviews.section :reviews="$product->reviews" :productId="$product->id" />

</x-layout>
