<template>
    
    <div id="app">
        
       
        <input type="text" v-model="name">
        <greeter @alertName="alertName($event)" :name="name"></greeter>
        
        
       
    </div>
   
   
   
    
</template>

<script>
 
    
    
    import Greeter from './Greeter.vue'
    

    
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
             Greeter
            
        }
        
      
    }
</script>

<style scoped>

</style>