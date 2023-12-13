import { createRouter, createWebHistory } from "vue-router";
import CardsIndex from "@/components/cards/Index.vue";

const routes = [
    { path: '/dashboard', component: CardsIndex },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
