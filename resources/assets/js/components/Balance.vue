<template>
    <div id="app">
        
        <ul>
            <li v-for="card in cards" v-text="card"></li>
        </ul>
    
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                cards: []

            }
        },

        mounted() {
            axios({
                method: 'get',
                url: '/api/cards/'
            })
                .then(response => this.cards = response.data)
        }
    
    }

    

    
</script>

<style scoped>

</style>