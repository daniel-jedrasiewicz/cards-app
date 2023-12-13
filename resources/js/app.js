import './bootstrap';

import { createApp } from 'vue'
import Index from './components/cards/Index.vue'

createApp({})
    .component('CardsIndex', Index)
    // .use(router)
    .mount('#app')
