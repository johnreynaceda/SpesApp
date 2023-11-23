<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>


<body class="font-sans antialiased">

    <div class="flex h-screen overflow-hidden bg-white ">

        <div class="hidden md:flex md:flex-shrink-0 relative">

            <div class="flex flex-col w-64 ">

                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-gray-500  border-r relative">
                    <div class="absolute -left-20 bottom-0">
                        <img src="{{ asset('images/spes_logo.png') }}" class="h-96 object-cover opacity-10"
                            alt="">
                    </div>
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg font-semibold flex items-center justify-center tracking-tighter text-gray-50 focus:outline-none focus:ring "
                            href="/">
                            <span class="text-2xl font-bold ">SPES-OAS</span>
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-shrink-0 p-4 px-4 mt-10 mb-5">
                        <div class="relative inline-flex items-center w-full">
                            <div
                                class="inline-flex items-center cursor-pointer bg-white bg-opacity-90 justify-between w-full px-4 py-5  text-lg font-medium text-center group text-blue-5 transition duration-500 ease-in-out transform rounded-xl hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>
                                    <span class="flex-shrink-0 block group">
                                        <div class="flex items-center">
                                            <div>
                                                <img class="inline-block object-cover rounded-full h-9 w-9"
                                                    src="{{ asset('images/spes_logo.png') }}" alt="">
                                            </div>
                                            <div class="ml-3 text-left">
                                                <p class="text-sm font-bold uppercase group-hover:text-gray-600">
                                                    {{ auth()->user()->name }}
                                                </p>
                                                <p class="text-xs  text-gray-500">
                                                    Administrator
                                                </p>
                                            </div>
                                        </div>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col flex-grow px-4 ">
                        <nav class="flex-1 space-y-1">
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                Analytics
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-gray-600 fill-gray-600 scale-95' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2 mt-1   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-gray-600 hover:fill-gray-600"
                                        href="{{ route('admin.dashboard') }}">
                                        {{-- <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img"
                                            aria-label="aperture outline"></ion-icon> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M13 21V11H21V21H13ZM3 13V3H11V13H3ZM9 11V5H5V11H9ZM3 21V15H11V21H3ZM5 19H9V17H5V19ZM15 19H19V13H15V19ZM13 3H21V9H13V3ZM15 5V7H19V5H15Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                MANAGE
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.documents') ? 'bg-white text-gray-600 fill-gray-600 scale-95' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2 mt-1   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-gray-600 hover:fill-gray-600"
                                        href="{{ route('admin.documents') }}">
                                        {{-- <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img"
                                            aria-label="aperture outline"></ion-icon> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M10.4142 3L12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142ZM18 18H14V15H16V13H14V11H16V9H14V7H11.5858L9.58579 5H4V19H20V7H16V9H18V11H16V13H18V18Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            Documents
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.applicants') ? 'bg-white text-gray-600 fill-gray-600 scale-95' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2 mt-1   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-gray-600 hover:fill-gray-600"
                                        href="{{ route('admin.applicants') }}">
                                        {{-- <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img"
                                            aria-label="aperture outline"></ion-icon> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M9.55 11.5C8.30736 11.5 7.3 10.4926 7.3 9.25C7.3 8.00736 8.30736 7 9.55 7C10.7926 7 11.8 8.00736 11.8 9.25C11.8 10.4926 10.7926 11.5 9.55 11.5ZM10 19.748V16.4C10 15.9116 10.1442 15.4627 10.4041 15.0624C10.1087 15.0213 9.80681 15 9.5 15C7.93201 15 6.49369 15.5552 5.37091 16.4797C6.44909 18.0721 8.08593 19.2553 10 19.748ZM4.45286 14.66C5.86432 13.6168 7.61013 13 9.5 13C10.5435 13 11.5431 13.188 12.4667 13.5321C13.3447 13.1888 14.3924 13 15.5 13C17.1597 13 18.6849 13.4239 19.706 14.1563C19.8976 13.4703 20 12.7471 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 12.9325 4.15956 13.8278 4.45286 14.66ZM18.8794 16.0859C18.4862 15.5526 17.1708 15 15.5 15C13.4939 15 12 15.7967 12 16.4V20C14.9255 20 17.4843 18.4296 18.8794 16.0859ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM15.5 12.5C14.3954 12.5 13.5 11.6046 13.5 10.5C13.5 9.39543 14.3954 8.5 15.5 8.5C16.6046 8.5 17.5 9.39543 17.5 10.5C17.5 11.6046 16.6046 12.5 15.5 12.5Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            Applicants
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.category') ? 'bg-white text-gray-600 fill-gray-600 scale-95' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2 mt-1   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-gray-600 hover:fill-gray-600"
                                        href="{{ route('admin.category') }}">
                                        {{-- <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img"
                                            aria-label="aperture outline"></ion-icon> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M2 18H9V20H2V18ZM2 11H11V13H2V11ZM2 4H22V6H2V4ZM20.674 13.0251L21.8301 12.634L22.8301 14.366L21.914 15.1711C21.9704 15.4386 22 15.7158 22 16C22 16.2842 21.9704 16.5614 21.914 16.8289L22.8301 17.634L21.8301 19.366L20.674 18.9749C20.2635 19.3441 19.7763 19.6295 19.2391 19.8044L19 21H17L16.7609 19.8044C16.2237 19.6295 15.7365 19.3441 15.326 18.9749L14.1699 19.366L13.1699 17.634L14.086 16.8289C14.0296 16.5614 14 16.2842 14 16C14 15.7158 14.0296 15.4386 14.086 15.1711L13.1699 14.366L14.1699 12.634L15.326 13.0251C15.7365 12.6559 16.2237 12.3705 16.7609 12.1956L17 11H19L19.2391 12.1956C19.7763 12.3705 20.2635 12.6559 20.674 13.0251ZM18 18C19.1046 18 20 17.1046 20 16C20 14.8954 19.1046 14 18 14C16.8954 14 16 14.8954 16 16C16 17.1046 16.8954 18 18 18Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            SPES Category
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.passers') ? 'bg-white text-gray-600 fill-gray-600 scale-95' : 'text-white fill-white' }} inline-flex items-center w-full px-4 py-2 mt-1   transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-gray-600 hover:fill-gray-600"
                                        href="{{ route('admin.passers') }}">
                                        {{-- <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img"
                                            aria-label="aperture outline"></ion-icon> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M9.55 11.5C8.30736 11.5 7.3 10.4926 7.3 9.25C7.3 8.00736 8.30736 7 9.55 7C10.7926 7 11.8 8.00736 11.8 9.25C11.8 10.4926 10.7926 11.5 9.55 11.5ZM10 19.748V16.4C10 15.9116 10.1442 15.4627 10.4041 15.0624C10.1087 15.0213 9.80681 15 9.5 15C7.93201 15 6.49369 15.5552 5.37091 16.4797C6.44909 18.0721 8.08593 19.2553 10 19.748ZM4.45286 14.66C5.86432 13.6168 7.61013 13 9.5 13C10.5435 13 11.5431 13.188 12.4667 13.5321C13.3447 13.1888 14.3924 13 15.5 13C17.1597 13 18.6849 13.4239 19.706 14.1563C19.8976 13.4703 20 12.7471 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 12.9325 4.15956 13.8278 4.45286 14.66ZM18.8794 16.0859C18.4862 15.5526 17.1708 15 15.5 15C13.4939 15 12 15.7967 12 16.4V20C14.9255 20 17.4843 18.4296 18.8794 16.0859ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM15.5 12.5C14.3954 12.5 13.5 11.6046 13.5 10.5C13.5 9.39543 14.3954 8.5 15.5 8.5C16.6046 8.5 17.5 9.39543 17.5 10.5C17.5 11.6046 16.6046 12.5 15.5 12.5Z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">
                                            Passers
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="px-4 mx-auto  sm:px-6 md:px-8">
                        <!-- === Remove and replace with your own content... === -->
                        <div class="py-4">

                            <div class="pb-10 flex justify-between items-start">
                                <div class="flex flex-col space-y-1 justify-start ">
                                    <div class="text-2xl uppercase font-bold text-gray-700">
                                        @yield('title')
                                    </div>
                                    <div>
                                        <nav class="flex  " aria-label="Breadcrumb">
                                            <ol role="list" class="flex items-center space-x-2">
                                                <li>
                                                    <div class="flex items-center">
                                                        <a href="#"
                                                            class="inline-flex items-center text-sm font-medium text-gray-500 duration-200 hover:text-gray-700 hover:scale-95">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                class="flex-shrink-0 w-4 h-4 md hydrated fill-gray-500">
                                                                <path
                                                                    d="M13 18.9997H19V9.97791L12 4.53346L5 9.97791V18.9997H11V12.9997H13V18.9997ZM21 19.9997C21 20.552 20.5523 20.9997 20 20.9997H4C3.44772 20.9997 3 20.552 3 19.9997V9.48882C3 9.18023 3.14247 8.88893 3.38606 8.69947L11.3861 2.47725C11.7472 2.19639 12.2528 2.19639 12.6139 2.47725L20.6139 8.69947C20.8575 8.88893 21 9.18023 21 9.48882V19.9997Z">
                                                                </path>
                                                            </svg>
                                                            <span class="ml-2">
                                                                Home
                                                            </span>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="flex items-center">
                                                        <span class="flex-shrink-0 w-5 h-5 text-gray-300">
                                                            /
                                                        </span>
                                                        <a href="#"
                                                            class=" text-sm font-medium text-gray-500 hover:scale-95 hover:text-gray-700">
                                                            @yield('title')
                                                        </a>
                                                    </div>
                                                </li>

                                            </ol>
                                        </nav>
                                    </div>

                                </div>
                                <div class="relative flex-shrink-0 ml-5" @click.away="open = false"
                                    x-data="{ open: false }">
                                    <div>

                                        <button @click="open = !open" class="flex space-x-3 items-center group">
                                            <img src="{{ asset('images/spes_logo.png') }}"
                                                class="h-12 w-12 rounded-full object-cover bg-blue-400"
                                                alt="">
                                            <div class="flex space-x-5 items-center ">
                                                <div class="flex flex-col text-left">
                                                    <h1 class="font-bold group-hover:text-blue-700 uppercase">
                                                        {{ auth()->user()->name }}</h1>
                                                    <span class="leading-3 text-gray-500 text-sm">Administrator</span>
                                                </div>
                                                <div>
                                                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="h-6 w-6 fill-gray-500 transition-transform duration-200 transform group-hover:fill-blue-700 rotate-0"">
                                                        <path d="M12 16L6 10H18L12 16Z"></path>
                                                    </svg>
                                                </div>
                                            </div>


                                        </button>
                                    </div>

                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                        tabindex="-1" style="display: none;">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-500"
                                            role="menuitem" tabindex="-1" id="user-menu-item-0">
                                            Your Profile
                                        </a>

                                        <a href="#" class="block px-4 py-2 text-sm text-gray-500"
                                            role="menuitem" tabindex="-1" id="user-menu-item-1">
                                            Settings
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="#"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                                class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                                tabindex="-1" id="user-menu-item-2">
                                                Sign out
                                            </a>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <div>
                                {{ $slot }}
                            </div>

                        </div>
                        <!-- === End ===  -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    <x-dialog z-index="z-50" blur="md" align="center" />
</body>

</html>
