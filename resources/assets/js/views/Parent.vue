
<template>
    <div class="parent">
        <h2>Parent Component</h2>
        <h2>This is the parent</h2>
        
    
        <h3>Child Component</h3>
        <div class="child">
            <h2>This is the child</h2>
           <child :text="message"></child>
        </div><!-- /.child -->
     </div><!-- /.parent -->
    
   
</template>

<script>
    import Child from './Child.vue'

    
    export default {
        name: 'Parent',
        data () {
            return {
               
                message: ''
            }
        },
        components: {
            Child,
        },
        methods: {
        
        }
    }
</script>