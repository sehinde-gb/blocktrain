<template>
    
   <footer>
       <h1 v-on:click="changeTitle">{{ title }}</h1>
        <router-link to="/parent">Parent</router-link>
        <router-link to="/checkin">Checkin</router-link>
        <router-link to="/parent">Checkout</router-link>
        <p>{{ copyright }}</p>
    </footer>

</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                copyright: 'Copyright 2018 Vue Ninjas'
            }
        },
        methods: {
            changeTitle: function() {
                this.$emit('changeTitle', 'Vue Wizards')
            }
        }
    }
</script>

<style scoped>

</style>