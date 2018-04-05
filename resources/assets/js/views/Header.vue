<template>
    <header>
        <h1 v-on:click="changeTitle">{{ title }}</h1>
    </header>
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
                //title: 'Block Train App'
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
 header {
    background: lightgreen;
    padding: 10px;
 }
</style>