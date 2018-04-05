<template>
    <header>
        <nav>
            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'parent' }">Parent</router-link>
            <router-link :to="{ name: 'checkin' }">Check In</router-link>
            <router-link :to="{ name: 'checkout' }">Check Out</router-link>
            <router-link :to="{ name: 'journey' }">Journey</router-link>
        
        </nav>
       
    </header>
</template>

<script>
    export default {
    
    }
</script>

<style scoped>

</style>