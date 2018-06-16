<template>
    <div class="jumbotron">
        <h1 class="display-4">Welcome Home</h1>
        <h4>Your Train is Blocked !</h4>
        <p class="lead">You are on the home page of the Vue application</p>
        <hr class="my-4">
        <p>This text is not important, but thanks for reading it.</p>
        {{  welcome }}
        
        
    </div>
   
</template>

<script>

export default {
    
    computed: {
        welcome() {
            return this.$store.getters.welcome;
        }
    }
    
        
      
}
</script>

<style scoped>
    h1 {
        text-align: center;
        padding: 20px;
    }
    
    
    .container {
        max-width: 960px;
    }

    


</style>