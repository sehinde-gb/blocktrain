<template>
    <div>
        <h1>Cards Overview</h1>
        <p>Card ID is {{ $route.params.cardId }}</p>
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

</style>