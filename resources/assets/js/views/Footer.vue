<template>
    
   <footer>
       <h3>{{ title }}</h3>
        <router-link to="/parent">Parent</router-link>
        <router-link to="/checkin">Checkin</router-link>
        <router-link to="/parent">Checkout</router-link>
        <p>{{ copyright }}</p>
    </footer>

</template>

<script>
    import { bus } from '../app';
    
    export default {
        props: {
            title: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                copyright: 'Copyright 2018'
            }
        },
        created() {
            bus.$on('titleChanged',(data) => {
                this.title = data;
            })
        }
    }
</script>

<style scoped>

footer {
    background-color: black;
    color: green;
    
}

h3 {
    padding: 10px;
    text-align: center;
}

p {
    text-align: center;
}
</style>