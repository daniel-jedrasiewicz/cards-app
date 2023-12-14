import {createRouter, createWebHistory} from "vue-router";

import AuthenticatedLayout from '@/layouts/Authenticated.vue';
import GuestLayout from '@/layouts/Guest.vue';

import CardsIndex from "@/components/cards/Index.vue";
import CardsCreate from "@/components/cards/Create.vue";
import CardsEdit from '@/components/cards/Edit.vue'
import Login from '@/components/Auth/Login.vue';

function auth(to, from, next) {
    if (JSON.parse(localStorage.getItem('loggedIn'))) {
        next()
    }

    next('/login')
}

const routes = [
    {
        path: '/',
        redirect: { name: 'login' },
        component: GuestLayout,
        children: [
            {
                path: '/login',
                name: 'login',
                component: Login
            },
        ]
    },
    {
        component: AuthenticatedLayout,
        beforeEnter: auth,
        children: [
            {path: '/cards', name: 'cards.index', component: CardsIndex, meta: {title: 'Cards'}},
            {path: '/cards/create', name: 'cards.create', component: CardsCreate, meta: {title: 'Add new card'}},
            {path: '/cards/edit/:id', name: 'cards.edit', component: CardsEdit, meta: {title: 'Edit card'}},
        ]
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
