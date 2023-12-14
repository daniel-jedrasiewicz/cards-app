<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CardsApp</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body style="font-family: Open Sans, sans-serif">
<section class="px-8 py-4">
    <nav class="lg:flex lg:justify-between lg:items-center">
        <div>
            <a href="/">
                <img src="{{ asset('img/cards-logo.webp') }}" class="object-scale-down w-60 max-h-40">
            </a>
        </div>
        @if (Route::has('login'))
            <div class="mt-8 lg:mt-0">
                <a href="{{ route('login') }}"
                   class="bg-orange-600 ml-2 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log
                    in</a>
            </div>
        @endif
    </nav>
    <header class="max-w-4xl mx-auto mt-20 text-center">
        <div class="max-w-4xl max-auto">
            <h1 class="text-4xl">
                Welcome to <span class="text-orange-600">CardsApp!</span>
            </h1>

            <p class="text-sm mt-8">CardApp is the place where you can easily
                view, add, and remove gift cards.</p>
        </div>
    </header>
    <main class="max-w-4xl mx-auto mt-20 space-y-6">
        <article
            class="transition-colors duration-300 hover:bg-gray-100 border-black border border-opacity-0 hover:border-opacity-5 rounded-xl">
            <div class="py-6 px-5 flex">
                <div class="flex-1 mr-6">
                    <img src="{{ asset('img/chart-lp.webp') }}" class="rounded-xl">
                </div>
                <div class="flex-1">
                    <header>
                        <div class="flex flex-wrap gap-2 md:gap-3">
                            <span
                                class="px-3 py-1 border border-blue-600 rounded-full text-xs uppercase text-blue-600 font-semibold">Php</span>
                            <span
                                class="px-3 py-1 border border-red-600 rounded-full text-xs uppercase text-red-600 font-semibold">Laravel</span>
                            <span
                                class="px-3 py-1 border border-green-600 rounded-full text-xs uppercase text-green-600 font-semibold">Vue.js</span>
                            <span
                                class="px-3 py-1 border border-orange-600 rounded-full text-xs uppercase text-orange-600 font-semibold">Mysql</span>
                        </div>

                        <div class="mt-5">
                            <h1 class="text-2xl font-medium">
                                Explore a seamless experience
                            </h1>
                        </div>
                    </header>

                    <div class="text-sm mt-8">
                        <p>CardsApp allows you to manage your gift cards effortlessly. Whether you're keeping track of
                            your collection or discovering new ones, CardApp
                            simplifies the process for you.</p>
                    </div>
                </div>

            </div>
        </article>

        <div class="grid grid-cols-2">
            <article
                class="transition-colors duration-300 hover:bg-gray-100 border-black border border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5">
                    <div>
                        <img src="{{ asset('img/delete-lp.webp') }}" class="rounded-xl">
                    </div>
                    <div class="flex-1">
                        <header>

                            <div class="mt-5">
                                <h1 class="text-2xl font-medium">
                                    Remove cards any time
                                </h1>
                            </div>
                        </header>

                        <div class="text-sm mt-8">
                            <p>With our application, you can easily manage your cards, removing those you no longer
                                need. The card removal process in CardsApp is intuitive and fast.</p>
                        </div>
                    </div>

                </div>
            </article>
            <article
                class="transition-colors duration-300 hover:bg-gray-100 border-black border border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5">
                    <div>
                        <img src="{{ asset('img/edit-lp.webp') }}" class="rounded-xl">
                    </div>
                    <div class="flex-1">
                        <header>

                            <div class="mt-5">
                                <h1 class="text-2xl font-medium">
                                    Show and update existing cards
                                </h1>
                            </div>
                        </header>

                        <div class="text-sm mt-8">
                            <p>CardsApp allows you to manage your gift cards effortlessly. Whether you're keeping track
                                of your collection or discovering new ones, CardApp
                                simplifies the process for you.</p>
                        </div>
                    </div>

                </div>
            </article>
        </div>
    </main>
    <footer class="bg-gray-100 border-black border border-opacity-0 border-opacity-5 rounded-xl text-center p-10 mt-20">
        <p class="text-sm">Copyright © By Daniel Jędrasiewicz</p>
    </footer>
</section>
</body>
</html>
