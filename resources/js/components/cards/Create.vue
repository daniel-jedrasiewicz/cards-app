<template>
    <form @submit.prevent="submit">
        <div>
            <label for="card-number" class="block text-sm font-medium text-gray-700">
                Card Number
            </label>
            <input id="card-number" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-4">
            <label for="pin" class="block text-sm font-medium text-gray-700">
                Card PIN
            </label>
            <input id="pin" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-4">
            <label for="activation-date" class="block text-sm font-medium text-gray-700">
                Activation Date
            </label>
            <input id="activation-date" type="date"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-4">
            <label for="expiration-date" class="block text-sm font-medium text-gray-700">
                Expiration Date
            </label>
            <input id="expiration-date" type="date"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-4">
            <label for="balance" class="block text-sm font-medium text-gray-700">
                Balance
            </label>
            <input id="balance" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="mt-4">
            <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm uppercase text-white">Save</button>
        </div>
    </form>
</template>

<script setup>
const submit = () => {
    console.log('submitted')
}

</script>
