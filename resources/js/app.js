import './bootstrap';
import { createApp } from 'vue'
import router from './router'
import CardsIndex from './components/cards/Index.vue'

const app = createApp({
    components: {
        CardsIndex
    }
});

app.use(router).mount('#app');
