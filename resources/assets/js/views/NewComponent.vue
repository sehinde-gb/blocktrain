<template>
    <h1>Hello {{ startingCity }}</h1>
</template>

<script>
    export default {
        name: "NewComponent",
        
        props: {
            startingCity: {
                type: String,
                default: ''
            }
        }
    }
</script>

<style scoped>

</style>