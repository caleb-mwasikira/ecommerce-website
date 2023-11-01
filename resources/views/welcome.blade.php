@props([
    'products' => [],
])

<x-layout>
    @include('partials.header.carousel')

    <section class="bg-white py-8">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <nav id="store" class="w-full z-30 top-0 px-4 md:px-0 py-2">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
                    <p class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-md">
                        Store
                    </p>

                    <div class="flex items-center" id="store-nav-content">
                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>

            <section class="bg-white py-8">
                <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                    @if (empty($products))
                        <div class="w-full mx-auto">
                            <p class="text-center text-sm">
                                There are currently no products available in the catalog. Please try again later
                            </p>
                        </div>
                    @else
                        @foreach ($products as $product)
                            <x-products.card :product="$product" />
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </section>

</x-layout>
>>>>>>> Stashed changes
>>>>>>> Stashed changes
