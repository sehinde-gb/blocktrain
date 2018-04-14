<template>
    <div>
     
            
            <ul class="list-group">
                
                <li class="list-group-item" v-for="(start, index) in starts">
                    <div class="card">
                        <div class="card-section">
                            <p> {{ index }} </p>
                        </div>
                        <div class="card-divider">
                            <p>From {{ start }}</p>
                        </div>
                    </div>
               
                
                    <button @click="deleteStart(start.id)" class="btn btn-danger btn-xs pull-right">Delete</button>
                </li>
            </ul>
       
    </div>
    
    </div>
</template>

<script>
    
export default {
    
    props: ['starts']

}
</script>

<style scoped>

</style>