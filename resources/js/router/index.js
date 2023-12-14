import { createRouter, createWebHistory } from "vue-router";
import CardsIndex from "@/components/cards/Index.vue";
import CardsCreate from "@/components/cards/Create.vue";
import CardsEdit from '@/components/cards/Edit.vue'

const routes = [
    { path: '/', name: 'cards.index',component: CardsIndex, meta: { title: 'Cards' }  },
    { path: '/cards/create', name: 'cards.create', component: CardsCreate, meta: { title: 'Add new card' }  },
    { path: '/cards/edit/:id', name: 'cards.edit', component: CardsEdit, meta: { title: 'Edit card' }  },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
