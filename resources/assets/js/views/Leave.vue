<template>
    <div>
        <div class="card m-3" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title" v-text="thecardtitle"></h5>
                <p class="card-text">I am the  <b>leave component</b>.</p>
                <button @click="messageEnter" class="btn btn-primary">Message Enter</button>
                <div v-if="messageson" class="mt-3 alert alert-secondary" v-html="messageson"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
    
        props: ['messageson'],
        
        data() {
            return {
                thecardtitle: 'Child Component!'
            }
        },
        
        methods: {
            messageEnter() {
                this.$emit('leavesaid', 'Swipe said do your homework')
            }
        }
    }
</script>

<style scoped>
    div.card {
        color: #004085;
        border: 4px solid #b8daff;
    }
</style>