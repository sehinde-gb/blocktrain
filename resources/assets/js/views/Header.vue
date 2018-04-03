<template>
    <header>
        <h1>{{ text }}</h1>
    </header>
</template>

<script>
    export default {
        props: ['text'],
        
        data() {
            return {
            
            }
        }
    }
</script>

<style scoped>
 header {
    background: lightgreen;
    padding: 10px;
 }
 
 h1{
    color: #222;
    text-align: center;
 }
</style>