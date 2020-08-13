import DetailTable from '../components/DetailTable'
import DividendTable from '../components/DividendTable'
new Vue({
    el: '#middle',
    components: { DetailTable, DividendTable },
    data: {
        loading: true,
        users: [],
        selectedUser: null,
    },
    methods: {
        showPortfolio(item) {
            this.selectedUser = item
        },
    },
    created() {
        axios.get('users/shared').then(response => {
            this.users = response.data.data
            this.loading = false
        })
    }
})