<template>
    <div>
     
            <h1>All Journeys</h1>
            <ul class="list-group">
                <div class="card">
                    <li class="list-group-item" v-for="start in starts" v-text="start">
                        <button @click="deleteStart(start.id)" class="btn btn-danger btn-xs pull-right">Delete</button>
                        </li>
                </div>
            </ul>
       

    
    </div>
</template>

<script>
    
export default {

    props: ['starts']
    
    /*data: function () {
        return {
            stations: [
                {from: 'Stanmore', to: 'Chigwell'},
                {from: 'Stanmore', to: 'Chigwell'},
                {from: 'Stanmore', to: 'Chigwell'},
                {from: 'Stanmore', to: 'Chigwell'}
            ]

        }
    }*/

}
</script>

<style scoped>

</style>