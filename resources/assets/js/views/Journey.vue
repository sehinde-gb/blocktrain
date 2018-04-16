<template>
    <div>
       
        <app-balance v-bind:result="result" v-bind:end="end"></app-balance>
    </div>
</template>

<script>
    import Balance from './Balance.vue'

    export default {
        components: {
            'app-balance': Balance
        },
        mounted() {
            this.$http.get('/api/end/2').then(response => this.end = response.data);
        },
        
        created() {
            this.loading = true;
            this.$http.get('/api/start/1').then(response => this.result = response.data);
            
           

        },

        data() {
            return {
                result: [],
                end: []
            }
        }


    }
</script>

<style scoped>

</style>