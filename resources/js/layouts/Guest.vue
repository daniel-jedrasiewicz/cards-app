<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <!-- Zastąp poniższy kod SVG własnym tagiem img -->
                <img src="/img/cards-logo-removebg.png" alt="Your Logo" class="w-100 h-20">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <router-view></router-view>
        </div>
    </div>
</template>
