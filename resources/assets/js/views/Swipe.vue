<template>
    <div>
        <div class="card m-2" style="width: 40rem;">
            <div class="card-body">
                <h4 class="card-title"></h4>
                
                <div class="d-flex justify-content-center">
                    <leave></leave>
                    <enter></enter>
                
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
                thecardtitle: 'Parent component'
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