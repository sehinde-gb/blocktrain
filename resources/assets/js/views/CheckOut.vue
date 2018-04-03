/* Child */
<template>
    <div>
        
    
        <div class="child">
            <h2>This is the child</h2>
            <CheckIn :from="Stanmore"></CheckIn>
        </div><!-- /.child -->
    </div>
    
</template>

<script>
    import CheckIn from './CheckIn.vue'

    export default {
        
        data () {
            return {
            
            }
        },
        components: {
            CheckIn,
        }
        
    }
    
</script>

<style scoped>

</style>