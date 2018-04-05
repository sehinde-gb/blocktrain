<template>
    <header>
        <h3 v-on:click="changeTitle">{{ title }}</h3>
    </header>
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
        
        methods: {
            changeTitle: function() {
                //this.$emit('changeTitle', 'Vue Wizards')
                this.title = 'Vue Wizards';
                bus.$emit('titleChanged', this.title);
            }
        }
    }
</script>

<style scoped>
 header {
    background: lightgreen;
    padding: 10px;
 }
</style>