<template>
    <app-swipein v-bind:stations="stations"></app-swipein>
</template>

<script>
    
    export default {
        components: {
            'app-swipein': SwipeIn
        },
        created() {
            this.error = this.stations = null;
            this.loading = true;
            this.$http.get('/api/starts').then(response => this.stations = response.data);
        },

        data() {
            return {
                stations: []
            }
        }
        
    }
</script>

<style scoped>

</style>