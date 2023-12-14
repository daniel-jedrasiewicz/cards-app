<template>
    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
        <div class="min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Card Number</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">PIN</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Activation Date</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Expiration Date</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Balance</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <tr v-for="card in cards.data" :key="card.id">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        #{{ card.id }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ card.card_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ card.pin }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ card.activation_date }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ card.expiration_date }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        {{ card.balance }}
                    </td>
                    <td class="px-3 py-1 whitespace-no-wrap text-sm leading-5 text-gray-900">
                        <router-link :to="{ name: 'cards.edit', params: { id: card.id } }"
                                     class="inline-block px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                            Edit
                        </router-link>
                        <a href="#" @click.prevent="deleteCard(card.id)"
                           class="ml-2 inline-block px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700 ml-1">
                            Delete
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
            <TailwindPagination :data="cards" @pagination-change-page="getCards" class="mt-4" />
        </div>
    </div>
</template>

<script setup>

import { onMounted } from "vue";
import { TailwindPagination } from 'laravel-vue-pagination';
import useCards from "@/composables/cards";

const { cards, getCards, deleteCard } = useCards()
onMounted(() => {
    getCards()
})

</script>
