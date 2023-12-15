import './bootstrap';
import { createApp, onMounted } from 'vue'
import router from './router'
import VueSweetalert2 from 'vue-sweetalert2';
import useAuth from './composables/auth';

const app = createApp({
    setup() {
        const { getUser, loggedIn } = useAuth()
        if(loggedIn) {
            onMounted(getUser)
        }
    }
});

app.use(router).use(VueSweetalert2).mount('#app');
