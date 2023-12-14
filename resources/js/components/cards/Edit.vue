<template>
    <form @submit.prevent="updateCard(card)">
        <div>
            <label for="card-number" class="block text-sm font-medium text-gray-700">
                Card Number
            </label>
            <input v-model="card.card_number" id="card-number" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.card_number">
                    {{ message }}
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="pin" class="block text-sm font-medium text-gray-700">
                Card PIN
            </label>
            <input v-model="card.pin" id="pin" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.pin">
                    {{ message }}
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="activation-date" class="block text-sm font-medium text-gray-700">
                Activation Date
            </label>
            <input v-model="card.activation_date" id="activation-date" type="datetime-local"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.activation_date">
                    {{ message }}
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="expiration-date" class="block text-sm font-medium text-gray-700">
                Expiration Date
            </label>
            <input v-model="card.expiration_date" id="expiration-date" type="date"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.expiration_date">
                    {{ message }}
                </div>
            </div>
        </div>

        <div class="mt-4">
            <label for="balance" class="block text-sm font-medium text-gray-700">
                Balance
            </label>
            <input v-model="card.balance" id="balance" type="text"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <div class="text-red-600 mt-1">
                <div v-for="message in validationErrors?.balance">
                    {{ message }}
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button :disabled="isLoading" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm uppercase text-white disabled:opacity-75 disabled:cursor-not-allowed">
                <span v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></span>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Save</span>
            </button>
        </div>
    </form>
</template>

<script setup>

import { onMounted } from "vue";
import { useRoute } from "vue-router";
import useCards from '@/composables/cards';

const {card, getCard, updateCard, validationErrors, isLoading } = useCards()
const route = useRoute()

onMounted(() => {
    getCard(route.params.id)
})

</script>
