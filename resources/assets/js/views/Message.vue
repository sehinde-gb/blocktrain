/** Parent **/
<template>
    <div>
        <h1>{{ message }} </h1>
        <app-input :msg="message" @messageChanged="message = $event"></app-input>
    </div>
</template>

<script>
    import { EventBus } from '../app'
    import Input from './Input.vue'
    
    
    export default {
            data() {
                return {
                    message: 'This is a message'
                }
            },
            components: {
                'app-input': Input
            }
        
        
        
    }
</script>

<style scoped>

</style>