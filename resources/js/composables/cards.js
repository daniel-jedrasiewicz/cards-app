import { ref } from 'vue'

export default function useCards() {
    const cards = ref({})

    const getCards = async (page = 1) => {
        axios.get('/api/cards?page=' + page)
            .then(response => {
                cards.value = response.data;
            })
    }

    return { cards, getCards }
}
