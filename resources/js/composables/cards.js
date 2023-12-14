import { ref } from 'vue'
import { useRouter } from 'vue-router'

export default function useCards() {
    const cards = ref({})
    const card = ref({})
    const router = useRouter();
    const validationErrors = ref({})
    const isLoading = ref(false)


    const getCards = async (page = 1) => {
        axios.get('/api/cards?page=' + page)
            .then(response => {
                cards.value = response.data;
            })
    }

    const getCard = async (id) => {
        axios.get('/api/cards/' + id)
            .then(response => {
                card.value = response.data.data;
            })
    }

    const updateCard = async (card) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/cards/' + card.id, card)
            .then(response => {
                router.push({ name: 'cards.index' })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const storeCard = async (card) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/cards', card)
            .then(response => {
                router.push({ name: 'cards.index' })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                    isLoading.value = false
                }
            })
    }

    const deleteCard = async (id) => {
        if (!window.confirm('Are you sure')) {
            return;
        }
        await axios.delete('/api/cards/' + id)
        await getCards();
    }

        return { card, cards, getCards, getCard, updateCard ,storeCard, deleteCard, validationErrors, isLoading  }
}
