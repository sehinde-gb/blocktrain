<template>
    <div>
        <app-balance v-bind:result="result"></app-balance>
        <app-balance v-bind:end="end"></app-balance>
    </div>
</template>

<script>
    import Balance from './Balance.vue'

    export default {
        components: {
            'app-balance': Balance
        },
        mounted() {
            this.error = this.end = null;
            this.$http.get('/api/end/2').then(response => this.end = response.data);
        },
        created() {
            this.error = this.result = null;
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