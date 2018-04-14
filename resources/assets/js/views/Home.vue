<template>
    
    <div id="app">
        
       
        <input type="text" v-model="name">
        <greeter @alertName="alertName($event)" :name="name"></greeter>
        
        <li v-for=""></li>
       
    </div>
   
   
   
    
</template>

<script>
 
    
    
    import Greeter from './Greeter.vue'
    import SwipeIn from './SwipeIn'
    import SwipeOut from './SwipeOut'

    
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
             SwipeIn, SwipeOut
            
        }
        
      
    }
</script>

<style scoped>

</style>