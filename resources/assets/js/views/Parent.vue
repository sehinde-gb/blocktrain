/* src/components/Parent.vue */
<template>
    <div class="parent">
        <h2>PARENT COMPONENT</h2>
        <h1>{{ parentCounter }}</h1>
        <button @click="Increase" class="btn btn-danger">Increase Parent</button>
        <h3>Child Components</h3>
        <div class="child">
           <Child></Child>
           <Child></Child>
           <Child></Child>
        </div>
        <!-- /.child -->
    </div>
</template>

<script>
    import Child from './Child.vue'
    export default {
        name: 'Parent',
        data () {
            return {
                parentCounter : 0,
            }
        },
        components: {
            Child,
        },
        methods: {
            Increase: function(){
                this.parentCounter = this.parentCounter + 1;
            },
        }
    }
</script>