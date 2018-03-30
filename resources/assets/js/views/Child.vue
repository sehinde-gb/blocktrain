</* src/components/Child.vue */
<template>
    <div class="counter-block">
        <h3>{{ childCounter }}</h3>
        <button @click="Increase">Increase Me</button>
        <button @click="deCrease">Decrease Me </button>
    </div>
</template>

<script type="text/javascript">
    export default{
        data () {
            return {
                childCounter: 0
            }
        },
        methods : {
            Increase: function(){
                this.childCounter = this.childCounter + 1;
            },
            deCrease(){
                this.childCounter = this.childCounter - 1;
            },
        }
    }
</script>