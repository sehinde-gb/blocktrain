<template>
    <div id="app">
        <!-- initial select (options hardcoded) -->
        <h2>Add a Journey</h2>
        <form v-if="!submitted">
            <label>Start</label>
            <input type="text" v-model.lazy="journey.start" required/>
            <label>Cost</label>
            <input type="text" v-model.lazy="journey.cost" required/>
            
            <div id="checkboxes">
                <label>Young Persons Railcard</label>
                <input type="checkbox" value="young" v-model="journey.discounts"/>
                <label>Freedom Pass</label>
                <input type="checkbox" value="freedom" v-model="journey.discounts"/>
               
            </div><!-- /#checkboxes -->
            
            <label>Station:</label>
            <select v-model="journey.station">
            <option v-for="station in stations">{{ station }}</option>
            </select>
          
            <button v-on:click.prevent="post">Swipe</button>
        </form>
        
        <div v-if="submitted">
            <h3>Thanks for swiping your card</h3>
        </div>
            
            <div id="preview">
                <h3>Preview Journey</h3>
                <p>Journey start {{ journey.start }}</p>
                <p>Journey content </p>
                <p>{{ journey.cost }}</p>
                <p>Journey Discounts:</p>
                
                <ul>
                    <li v-for="discount in journey.discounts">{{ discount }}</li>
                </ul>
                
                <p>Station: {{ journey.station }}</p>
                
                
            </div><!-- /#preview -->
     
        
    </div>
</template>

<script>
    export default {
       
        data () {
            return {
               journey: {
                   start: '',
                   cost: '',
                   discounts: [],
                   station: '',
                   userId: 1
               },
               stations: ['Mill Hill Broadway', 'New Barnet', 'Cricklewood'],
               submitted: false
            }
        },
        methods: {
            post: function() {
                
                axios.post('https://jsonplaceholder.typicode.com/posts', {
                    start: this.journey.start,
                    cost: this.journey.cost,
                    discounts: this.journey.discounts,
                    station: this.journey.station,
                    userId: 1
                    
                }).then(function(data) {
                    console.log(data);
                    this.submitted = true
                });
            }
        }
    }
</script>

<style>
 
    #app * {
        box-sizing: border-box;
    }
    
    #app {
        margin: 20px auto;
        max-width: 500px;
    }
    label {
        display: block;
        margin: 20px 0 10px;
    }
    
    input[type="text"], textarea {
        display: block;
        width: 100%;
        padding: 8px;
    }
    
    #preview {
        padding: 10px 20px;
        border: 1px dotted #ccc;
        margin: 30px 0;
    }
    
    h3 {
        margin-top: 10px;
    }
    #checkboxes input {
        display: inline-block;
        margin-right: 10px;
    }
    
    #checkboxes label {
        display: inline-block;
    }
    
    
    
    
</style>