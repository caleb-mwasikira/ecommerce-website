<nav id="header" class="w-full z-30 top-0 py-2">
    <div class="relative w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
        <label for="menu-toggle" class="cursor-pointer md:hidden block px-4">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 20 20">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <nav class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                <li>
                    <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                        href="{{ route('home') }}">
                        Shop
                    </a>
                </li>
                <li>
                    <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="#">
                        About
                    </a>
                </li>
            </ul>
        </nav>

        <div class="order-1 md:order-2 mx-auto">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-md uppercase"
                href="{{ route('home') }}">
                <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="20" viewBox="0 0 24 24">
                    <path
                        d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                Green Boutique
            </a>
        </div>

        <nav class="md:flex md:items-center md:w-auto w-full order-3 md:order-3 md:mr-0" id="menu-2">
            <ul class="md:flex items-center justify-between text-base text-gray-700 pt-8 md:pt-0">
                @guest
                    <div class="flex flex-col md:flex-row md:mr-8">
                        <li>
                            <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                                href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                        <li>
                            <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                                href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    </div>
                @endguest

                @auth
                    <li class="md:mr-8">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="inline-block no-underline hover:text-black hover:underline py-2 px-4">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>

        {{-- Add to cart button --}}
        <a class="absolute top-0 md:top-2 right-0 p-3 block no-underline hover:text-black" href="#">
            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24">
                <path
                    d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                <circle cx="10.5" cy="18.5" r="1.5" />
                <circle cx="17.5" cy="18.5" r="1.5" />
            </svg>
        </a>
    </div>
</nav>
