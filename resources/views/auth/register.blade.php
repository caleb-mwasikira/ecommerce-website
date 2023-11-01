@section('title', 'Create New Account')

<x-layout>
    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
    <main class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <h2 class="mt-5 text-center text-2xl leading-9 tracking-tight text-gray-900">
            Create a new account
        </h2>

        <div class="mt-5 mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST">
                @csrf
                <div class="space-y-2">
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
                        <div>
                            <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">
                                Firstname
                            </label>
                            <div class="mt-2">
                                <input id="firstname" name="firstname" type="text" placeholder="Enter your firstname"
                                    value="{{ old('firstname') }}" required
                                    class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">

                                @error('firstname')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">
                                Lastname
                            </label>
                            <div class="mt-2">
                                <input id="lastname" name="lastname" type="text" placeholder="Enter your lastname"
                                    value="{{ old('lastname') }}" required
                                    class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">

                                @error('lastname')
                                    <div class="text-xs text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                            Email address
                        </label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" placeholder="Enter your email"
                                autocomplete="email" value="{{ old('email') }}" required
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">

                            @error('email')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                            Password
                        </label>

                        <div class="mt-2">
                            <input id="password" name="password" type="password" placeholder="********" required
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">

                            @error('password')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="flex w-full justify-center rounded-sm bg-green-800 mt-8 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    Create Account
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 font-mono">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-green-700 hover:text-green-600">
                    Login to your account
                </a>
            </p>
        </div>
    </main>
</x-layout>
