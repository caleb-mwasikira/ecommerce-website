@props(['links', "endpoint"])

<nav aria-label="Breadcrumb" class="mb-2">
    <ol role="list" class="mx-8 flex items-center space-x-2">
        @foreach ($links as $name => $href)
            @if ($loop->first)
                <li>
                    <div class="flex items-center">
                        <a href="{{ route($href) }}"
                            class="mr-2 text-sm font-medium text-gray-900">{{ ucwords($name) }}</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                            class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
            @else
                <li>
                    <div class="flex items-center">
                        <a href="{{ route($href) }}"
                            class="mr-2 text-sm font-medium text-gray-900">{{ ucwords($name) }}</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                            class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
            @endif
        @endforeach

        <li class="text-sm">
            <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
                {{ ucwords($endpoint) }}
            </a>
        </li>
    </ol>
</nav>
