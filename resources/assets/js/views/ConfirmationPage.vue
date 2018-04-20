<template>
    <div id="app">
        <div class="container">
            <h1>This is our Confirmation Page</h1>
            <h1>Cards Overview</h1>
            <p>Card ID is {{ $route.params.cardId }}</p>
        </div><!-- /.container -->
        
    </div>
</template>

<script>
    export default {
        watch: {
            '$route' (to, from) {
                alert(to.params.cardId);
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
        height: 500px;
    }
</style>