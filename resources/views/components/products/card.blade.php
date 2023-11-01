@props(['product'])

<div class="m-6">
    <div class="group relative">
        <div class="w-56 h-56 overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75">
            <img src="{{ $product->media[0]->file_path }}" alt="Product image"
                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>

        <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-gray-700">
                    <a href="{{ route('view-product', ['id' => $product->id]) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $product->name }}
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">{{ ucwords($product->category->name) }}</p>
            </div>

            <p class="text-sm font-medium text-gray-900">£ {{ $product->price }}</p>
        </div>
    </div>
</div>
