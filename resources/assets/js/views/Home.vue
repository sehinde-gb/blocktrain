<template>
    
    <div id="app">
        
        <app-header v-bind:title="title" v-on:changeTitle="updateTitle($event)"></app-header>
        <app-navigation></app-navigation>
        <input type="text" v-model="name">
        <greeter @alertName="alertName($event)" :name="name"></greeter>
        <app-main></app-main>
        <app-footer v-bind:title="title" v-on:changeTitle="updateTitle($event)"></app-footer>
    </div>
   
   
   
    
</template>

<script>
 
    import Header from './Header.vue'
    import Navigation from './Navigation.vue'
    import Footer from './Footer.vue'
    import Greeter from './Greeter.vue'
    import Main from './Main.vue'

    
    export default {
        data() {
          return {
            name: '',
            title: "Block Train Ninjas"
          }
        },
        methods: {
            alertName(name) {
                alert(name)
            },
            
            updateTitle: function(updatedTitle) {
                this.title = updatedTitle;
            }
        },
        
        components: {
             Greeter,
             'app-header': Header,
             'app-navigation': Navigation,
             'app-main': Main,
             'app-footer': Footer
            
        }
        
      
    }
</script>

<style scoped>

</style>