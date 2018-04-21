<template>
    <div>
        <div class="card m-2" style="width: 40rem;">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <button @click="weSaidChill" class="btn btn-block btn-outline-danger" v-if="stopFighting()">Show says
                    stop fighting!
                </button>
                <div class="d-flex justify-content-center">
                    <leave :messageson="messageson" @leavesaid="messageEnter($event)"></leave>
                    <enter :messageenter="messageenter" @entersaid="messagesOn($event)"></enter>
                
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Enter from './Enter.vue';
    import Leave from './Leave.vue';

    export default {
        components: {Enter, Leave},
        
        data() {
            return {
                thecardtitle: 'Parent component',
                messageenter: '',
                messageson: ''
            }
        },
        
        methods: {
            messageEnter(message) {
                this.messageenter = message;
            },

            messagesOn(message) {
                this.messageson = message;
            },
            
            stopFighting() {
                if(this.messageenter && this.messageson) {
                    return true;
                }
                
                return false;
            },
            
            weSaidChill() {
                this.messageenter = '';
                this.messageson = '';
                
            }

        }
        
        
        
    }
</script>

<style scoped>
    div.card {
        color: #721c24;
        border: 4px solid #f5c6cb;
    }
</style>