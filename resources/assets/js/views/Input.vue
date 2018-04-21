<template>
    <div>
     
        <p>{{ msg }}</p>
        <input type="text" @input="changeMessage">
        <p>{{ message }}</p>
    
    </div>
   
</template>

<script>
    import { EventBus } from '../app'
    export default {
        props: ['msg'],
        
        data: function() {
            return {
                message: ''
            }
        },
        
        methods: {
            changeMessage(event) {
                this.message = event.target.value;
                this.$emit('messageChanged', this.message);
            }
        }
    }
</script>

<style scoped>

</style>