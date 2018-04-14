<template v-if="result">
    <div id="app">
        <div class="container">
            <div class="row">
                <h2>Your Journey</h2>
                <div class="col-md-6 col-md-offset-3">
    
                    <span class="city-span" v-model="from">From: {{  }}</span>
                    <span class="city-span" v-model="startingCity">{{  }}</span>
                    <span class="city-span" v-model="to">To {{ end.balance }}</span>
                </div>
                
                <div class="col-md-6">
    
                
                </div><!-- /.col-md-6 -->
                
                
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        props: ['result', 'end'],

        data: function() {
            return {
                from: '',
                startingCity: '',
                to: '',
                balance: ''
                
                
            }
        },
        computed: {
            //to: function() {
              //  return this.end.to;
            //},
            //from: function() {
              //  return this.result.from;
            //}
        }
       
    }
</script>

<style scoped>
    h2 {
        text-align: center;
        padding-bottom: 20px;
    }
    
    .col-md-6 {
        padding: 20px;
    }
</style>