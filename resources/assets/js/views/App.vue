<template>
    <div>
        <h1>Block Train Demo App</h1>
        
        <p>
            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'hello' }">Hello World</router-link>
            <router-link :to="{ name: 'journeys.index' }">Journeys</router-link>
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