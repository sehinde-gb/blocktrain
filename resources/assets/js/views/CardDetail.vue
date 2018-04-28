<template>
    <div>
        <div id="single-card">
            <h2>Card {{ card.id }}</h2>
            <h1>Card Number: {{ card.id }}</h1>
            <h2>Balance: {{ card.balance }}</h2>
            <h2>Current Balance: {{ card.current_balance }}</h2>
            <p>I have a dynamic id value of {{id}}</p>
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
            this.$http.get('https://blocktrain.test/api/cards/' + this.id).then((response) => {
                //console.log(response);
                this.card = response.body;
            });
        },
        
        filters: {
            toUpperCase(value) {
                return value.toUpperCase();
            }
        }
    }
</script>

<style scoped>
    #single-card {
        max-width: 960px;
        margin: 0 auto;
    }
</style>