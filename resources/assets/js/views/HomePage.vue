<template>
    <div class="jumbotron">
        <h1 class="display-4">Block Train Home!</h1>
        <p class="lead">You are on the home page of the Vue application</p>
        <hr class="my-4">
        <p>This text is not important, but thanks for reading it.</p>
        {{  welcome }}
        
        
    </div>
   
</template>

<script>

import Clients from '../components/passport/Clients';
import AuthorizedClients from '../components/passport/AuthorizedClients';
    
    

    
export default {
    
    components: {
        'passport-clients': Clients,
        'passport-authorized-clients': AuthorizedClients
    },
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