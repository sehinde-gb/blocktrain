<template>
    <footer class="container py-5">
    
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


</style>