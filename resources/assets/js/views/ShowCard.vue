<template>
    <div>
        <div id="single-card">
            <h1>Single Card</h1>
            <h1>{{ card.balance }}</h1>
           
        </div><!-- /#single-card -->
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: this.$route.params.id,
                card: {}
            }
        },
        
        created() {
            this.$http.get('api/cards/' + this.id).then((response) => {
                console.log(response);
                //this.card = response.balance
            })
        }

        
    }
</script>

<style scoped>

</style>