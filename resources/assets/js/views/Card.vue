<template>
    <div class="user">
        <h2>Card {{ card.id }}</h2>
    
      
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        
        mounted () {
            this.getCard(this.$route.params.id);
        },
        data: function() {
            return {
                card: {}
            }
        },
        methods: {
            getCard(id) {
                const vm = this

                this.$http.get('/api/cards/' + id)
                    .then(response => {
                        this.card = response.data
                    })
            }
        },
        watch: {
            '$route.params.id'(newId, oldId) {
                this.getCard(newId)
            }
        }

    }
</script>

<style scoped>

</style>