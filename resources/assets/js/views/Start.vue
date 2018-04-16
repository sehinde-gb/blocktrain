<template>
    <app-swipein v-bind:station="station"></app-swipein>
</template>

<script>

    import SwipeIn from './SwipeIn.vue'

    export default {
        
        components: {
            'app-swipein': SwipeIn
         
        },

        
        
        created() {
            //this.error = this.station = null;
            this.loading = true;
            this.$http.get('/api/start/1').then(response => this.station = response.data);
        },
        
        data() {
            return {
                station: []
            }
        }
        
        
        
    }
</script>

<style scoped>

</style>