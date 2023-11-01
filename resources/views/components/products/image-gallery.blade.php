@props(['images'])

<div class="flex flex-col md:flex-row gap-4 mx-8">
    @php
        $featuredImage = $images->shift();
    @endphp

    @isset($featuredImage)
        <div class="h-96">
            <img class="h-full rounded-lg group-hover:opacity-75 object-cover object-center" src="{{ $featuredImage->file_path }}"
                alt="Featured Product Image">
        </div>
    @endisset

    <div class="grid grid-cols-3 gap-4">
        @foreach ($images as $image)
            <div>
                <img class="h-28 max-w-full rounded-lg group-hover:opacity-75" src="{{ $image->file_path }}"
                    alt="Additional Product Image">
            </div>
        @endforeach
    </div>
</div>
