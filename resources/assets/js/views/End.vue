<template>
    <div>
        <app-swipein v-bind:station="station"></app-swipein>
        <app-swipeout v-bind:station="station"></app-swipeout>
    </div>
</template>

<script>
    import SwipeIn from './SwipeIn.vue'
    import SwipeOut from './SwipeOut.vue'

    export default {
   
        
        components: {
            'app-swipein': SwipeIn,
            'app-swipeout': SwipeOut
        },

        

        created() {
            //this.error = this.stations = null;
            this.loading = true;
            this.$http.get('/api/start/1').then(response => this.station = response.data);
            //alert(stations);
        },

        data() {
            return {
                station: [
                    //{from: '940GZZLUKBY', startingCity: 'Wandsworth'},
                    //{from: '940GZZLUKBY', startingCity: 'Wandsworth'},
                    //{from: '940GZZLUKBY', startingCity: 'Wandsworth'},
                    //{from: '940GZZLUKBY', startingCity: 'Wandsworth'}
                ]
            }
        }
        
        
    }
</script>

<style scoped>

</style>