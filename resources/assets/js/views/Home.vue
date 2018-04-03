<template>
    
    <div id="app">
        <p>This is the homepage</p>
        <app-header></app-header>
        <new-component :startingCity="Wimbled"></new-component>
        <app-footer></app-footer>
    </div>
   
   
   
    
</template>

<script>
    import NewComponent from './NewComponent.vue'
    import Header from './Header.vue'
    import Footer from './Footer.vue'
   
    
    export default {
        
        
        components: {
            NewComponent,
            'app-footer': Footer,
            'app-header': Header
            
        },
        data() {
            return {
            
            }

        },
       
    }
</script>

<style scoped>

</style>