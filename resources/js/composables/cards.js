import { ref } from 'vue'
import { useRouter } from 'vue-router'

export default function useCards() {
    const cards = ref({})
    const router = useRouter();
    const validationErrors = ref({})

    const getCards = async (page = 1) => {
        axios.get('/api/cards?page=' + page)
            .then(response => {
                cards.value = response.data;
            })
    }

    const storeCard = async (card) => {
        axios.post('/api/cards', card)
            .then(response => {
                router.push({ name: 'cards.index' })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
    }

    return { cards, getCards, storeCard, validationErrors }
}
