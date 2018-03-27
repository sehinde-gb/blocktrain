<template>
   <div id="app">

            <div class="card">
                <div class="card-divider">
                    {{ cards.balance }}
                </div>
                <div class="card-section">
                
                </div>
            </div>
       

   </div><!-- /#app -->

</template>

<script>
    export default {
        data: function() {
            return  {
                cards: {
                    balance: ''
                }
                
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