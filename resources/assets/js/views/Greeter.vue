<template>
    <div id="app">
        <h1>Hello {{ name }}</h1>
        <button @click="alertName">Alert</button>
    </div>
</template>

<script>
    export default {
        
        props: {
            name: {
                type: [String],
                required: true
            }
        
        },
        
        methods: {
            alertName() {
                this.$emit('alertName', this.name);
            }
        }

    }
</script>

<style scoped>

</style>