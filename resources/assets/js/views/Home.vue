<template>
    
    <div id="app">
        <p>This is the homepage</p>
        <app-header text="Vue Trains"></app-header>
        
     
        <check-in @applied="onApplied"></check-in>
        <h1 v-if="onApplied">You used a coupon</h1>
        <app-footer></app-footer>
    </div>
   
   
   
    
</template>

<script>
 
    import Header from './Header.vue'
    import Footer from './Footer.vue'
    import CheckIn from './CheckIn.vue'


    
    export default {
        
        
        components: {
             CheckIn,
            'app-footer': Footer,
            'app-header': Header
            
        },
        data() {
            return {
                onApplied: false
            }

        },
        
       created() {
            Event.$on('Applied', () => alert('Handling it'))
       }
    }
</script>

<style scoped>

</style>