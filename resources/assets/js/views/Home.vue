<template>
    
    <div id="app">
        <p>This is the homepage</p>
        <app-header text="Vue Trains"></app-header>
        <check-in></check-in>
        
        <greeter></greeter>
        <app-footer></app-footer>
    </div>
   
   
   
    
</template>

<script>
 
    import Header from './Header.vue'
    import Footer from './Footer.vue'
    import CheckIn from './CheckIn.vue'
    import Greeter from './Greeter.vue'

    
    export default {
        
        
        components: {
             CheckIn, Greeter,
            'app-footer': Footer,
            'app-header': Header
            
        }
        
      
    }
</script>

<style scoped>

</style>