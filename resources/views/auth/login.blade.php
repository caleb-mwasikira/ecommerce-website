@section('title', 'Login To Your Account')

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
            Sign in to your account
        </h2>

        <div class="mt-5 mx-auto sm:w-full sm:max-w-sm">
            <form action="/login" method="POST">
                @csrf
                <div class="space-y-2">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                            Email address
                        </label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" placeholder="Enter your email"
                                value="{{ old('email') }}" required           
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                            @error('email')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="text-sm">
                                <a href="#" class="font-semibold font-mono text-indigo-600 hover:text-indigo-500">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" placeholder="********" required
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                            @error('password')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="flex w-full justify-center rounded-full bg-indigo-600 mt-8 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Sign in
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 font-mono">
                Not a member?
                <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
                    Create your account today
                </a>
            </p>
        </div>
    </main>
</x-layout>
