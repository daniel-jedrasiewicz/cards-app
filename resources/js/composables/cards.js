import { ref } from 'vue'

export default function useCards() {
    const cards = ref([])

    const getCards = async () => {
        axios.get('/api/cards')
            .then(response => {
                cards.value = response.data.data;
            })
    }

    return { cards, getCards }
}
