<template>
    <div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <enter></enter>
                    </div><!-- /.col -->
                   
                    
                    
                </div><!-- /.row -->
    
                <div class="row">
                    <div class="col-sm">
                        <leave></leave>
                    </div><!--  -->
                </div>
                <!-- /.row -->
               
            </div><!-- /.container -->
            
          
    </div>
</template>

<script>
    import Enter from './Enter.vue';
    import Leave from './Leave.vue';
    
 export default {
        
        props: ['card'],
        
        components: {Enter, Leave},
       
        data() {
            return {
                thecardtitle: 'Parent component',
                from: '',
                complete: false
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