<template>
    <div>
        <app-swipeout v-bind:station="station"></app-swipeout>
    </div>
</template>

<script>
   
    import SwipeOut from './SwipeOut.vue'

    export default {
        components: {
            'app-swipeout': SwipeOut
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