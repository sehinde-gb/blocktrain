<template>
    <div class="jumbotron">
        <h1 class="display-4">Block Train Home!</h1>
        <p class="lead">You are on the home page of the Vue application</p>
        <hr class="my-4">
        <p>This text is not important, but thanks for reading it.</p>
        <p>Status is {{$route.query.status}}</p>
        
        <a class="btn btn-outline-primary btn-lg" role="button"><router-link to="/page-one">Click for Page 1</router-link></a>
        <a class="btn btn-outline-secondary btn-lg" role="button"><router-link to="/page-two">Click for Page 2</router-link></a>
    </div>
   
</template>

<script>

import Clients from '../components/passport/Clients';
import AuthorizedClients from '../components/passport/AuthorizedClients';
    
    

    
export default {
    
    components: {
        'passport-clients': Clients,
        'passport-authorized-clients': AuthorizedClients
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