<template>
    <div>
        <div class="card m-3" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title" v-text="thecardtitle"></h5>
                <p class="card-text">I am the  <b>leave component</b>.</p>
                <button @click="messageEnter" class="btn btn-primary">Message Enter</button>
                <div v-if="fromenter" class="mt-3 alert alert-secondary" v-html="fromenter"></div>
                <div v-if="fromstation" class="mt-3 alert alert-secondary" v-html="fromstation"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {EventBus} from '../app.js';

    export default {
        
        created() {
            EventBus.$on('entersaid', (message) => {
                this.fromenter = message;
            },
            EventBus.$on('firststation', (message) => {
                this.fromstation = message;
            })
            
            )
            
        },
        
        data() {
            return {
                thecardtitle: 'Child Component!',
                fromenter: '',
                fromstation: ''
            }
        },
        
        methods: {
            messageEnter() {
                //this.$emit('leavesaid', 'Swipe said do your homework')
                EventBus.$emit('leavesaid', 'Leave said do your homework');
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