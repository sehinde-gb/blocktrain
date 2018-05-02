<template>
    <div>
    <app-original v-bind:station="station"></app-original>
    </div>
</template>

<script>
    
    import Original from './Original.vue'

    export default {
        components: {
            'app-original': Original
        },

        

        created() {
            this.loading = true;
            
           
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