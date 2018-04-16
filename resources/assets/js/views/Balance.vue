<template v-if="result">
    <div id="app">
        <div class="container">
            <div class="row">
                <h2>Your Journey</h2>
                <div class="col-md-6 col-md-offset-3">
    
                    <span class="city-span" v-model="from">From: {{ result.from }}</span>
                    <span class="city-span" v-model="startingCity">ID {{ result.id }}</span>
                    <span class="city-span" v-model="to">To {{ result.startingCity }}</span>
                   
                </div>
                
                <div class="col-md-6">
    
                
                </div><!-- /.col-md-6 -->
                
                
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        props: ['result'],
        
        data: function() {
            return {
                from: '',
                startingCity: '',
                to: '',
                balance: ''
                
                
            }
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