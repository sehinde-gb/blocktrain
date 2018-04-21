<template>
    <header>
        <h3 v-on:click="changeTitle">{{ title }}</h3>
    </header>
</template>

<script>
    import { EventBus } from '../app';
    
    export default {
        props: {
            title: {
                type: String,
                default: ''
            }
        },
        
        mounted() {
            //this.title = this.selectedTitle;
        },
        
        methods: {
            changeTitle: function() {
                //this.selectedTitle = 'Vue Wizards';
               
                this.title = 'Vue Wizards';
                $bus.$emit('titleChanged', this.title);
            }
        }
    }
</script>

<style scoped>
 header {
    background: lightgreen;
    padding: 10px;
 }

 h3 {
     padding: 10px;
     text-align: center;
 }

 p {
     text-align: center;
 }
</style>