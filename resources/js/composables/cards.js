import {ref, inject} from 'vue'
import {useRouter} from 'vue-router'

export default function useCards() {
    const cards = ref({})
    const card = ref({})
    const router = useRouter();
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')


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
                router.push({name: 'cards.index'})
                swal({
                    icon: 'success',
                    title: 'Card saved successfully'
                })
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
                router.push({name: 'cards.index'})
                swal({
                    icon: 'success',
                    title: 'Card saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                    isLoading.value = false
                }
            })
    }

    const deleteCard = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/cards/' + id)
                        .then(response => {
                            getCards()
                            router.push({name: 'cards.index'})
                            swal({
                                icon: 'success',
                                title: 'Card deleted successfully'
                            })
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })
    }

    return {card, cards, getCards, getCard, updateCard, storeCard, deleteCard, validationErrors, isLoading}
}
