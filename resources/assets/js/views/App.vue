<template>
    <div>
        <h1>Block Train Demo App</h1>
     
        <p>
            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'parent' }">Parent</router-link>
            <router-link :to="{ name: 'checkin' }">Check In</router-link>
            <router-link :to="{ name: 'checkout' }">Check Out</router-link>
            
            
        </p>
        <div class="container">
            <router-view></router-view>
        </div><!-- /.container -->
    </div>
</template>

<script>
    export default {}
</script>

<style scoped>

</style>