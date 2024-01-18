@props(['product', 'categories'])
@section('title', 'Create or Edit Products')

<x-layout>
    <form action="" method="post" class="md:flex justify-between items-start mt-10 mx-4 md:mx-8">
        @csrf

        <x-products.cover-photo :media="$product?->media[0]" />

        <div class="md:w-1/2 md:ml-8 mx-auto container flex items-center justify-start md:justify-start flex-wrap gap-2">
            <div id="category" class="w-48">
                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">
                    *Category
                </label>

                <select id="category" name="category" required
                    class="block w-48 rounded-md border-0 px-2 py-1.5 bg-white text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:max-w-xs sm:text-sm leading-6">
                    @if (!$categories->isEmpty())
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" @selected($product?->category->name == $category->name)>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div id="product-name" class="w-48">
                <label for="product-name" class="block text-sm font-medium leading-6 text-gray-900">
                    *Product Name
                </label>

                <div class="mt-1">
                    <input type="text" name="product-name" id="product-name"
                        value="{{ old('product-name') ?? $product?->name }}" required
                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-gray-300 focus:ring-green-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div id="price-input" class="w-48">
                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                    *Price
                </label>

                <div class="relative mt-1 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>

                    <input type="number" name="price" id="price" value="{{ old('price') ?? $product?->price }}"
                        required
                        class="block w-48 rounded-md border-0 py-1.5 pl-7 pr-14 text-gray-900 ring-1 ring-inset outline-none ring-gray-300 focus:ring-green-500 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6"
                        placeholder="0.00">

                    <div class="absolute inset-y-0 right-0 flex items-center px-1">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="currency" name="currency"
                            class="h-full rounded-md border-0 bg-transparent py-0 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm">
                            <option>KSH</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="color-input" class="w-48">
                @php
                    $colors = ['yellow', 'red', 'green'];
                @endphp

                <label for="color" class="block text-sm font-medium leading-6 text-gray-900">
                    Available Colors
                </label>

                <select id="color" name="color"
                    class="block w-48 rounded-md border-0 px-2 py-1.5 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-none focus:ring-2 focus:ring-inset focus:ring-green-600 sm:max-w-xs sm:text-sm leading-6">
                    @foreach ($colors as $color)
                        <option value="{{ $color }}">{{ ucwords($color) }}</option>
                    @endforeach
                </select>
            </div>

            <div id="quantity-in-stock" class="w-48">
                <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">
                    *Quantity In Stock
                </label>

                <input type="number" name="quantity" id="quantity"
                    value="{{ old('quantity') ?? $product?->quantity_in_stock }}" required
                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset outline-none ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 placeholder:text-gray-400 sm:text-sm sm:leading-6"
                    placeholder="0.00">
            </div>

            <x-forms.input.number inputName="size" />
            <x-forms.input.number inputName="length" />
            <x-forms.input.number inputName="depth" />

            <div id="description" class="w-full">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                    Description
                </label>

                <div class="mt-1">
                    <textarea id="description" name="description" rows="5"
                        class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">{{ old('description') ?? $product->description?->body }}</textarea>
                </div>

                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Write a few sentences about your product.
                </p>
            </div>

            <div id="return-shipping-details" class="mt-8 px-4 md:px-0">
                <label for="return-shipping-details"
                    class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-sm">
                    Return Shipping Details
                </label>

                <x-forms.radio.button label="Refundable Shipping Costs" inputName="return-shipping-details"
                    value="refundable"
                    helperText="We will refund all shipping costs upon return of an item. <br />
                    Please read the terms and conditions in which we accept returned items" />

                <x-forms.radio.button label="Non-Refundable Shipping Costs" inputName="return-shipping-details"
                    value="non-refundable" isChecked="{{ true }}"
                    helperText="You will be responsible for paying for your own shipping costs for returning
                your item. <br /> Shipping costs are nonrefundable" />
            </div>
        </div>
    </form>
</x-layout>
