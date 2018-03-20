<template>
    <div id="app">
    
        <div class="journeys">
            <div class="loading" v-if="loading">
                Loading
            </div><!-- /.loading -->
        </div><!-- /.journeys -->
        
        <div v-if="error" class="error">
            {{ error }}
        </div><!-- /.error -->
        
        <ul v-if="journeys">
            <li v-for="{ id, startingCity, endingCity, fare } in journeys">
                <strong>Start:</strong>{{startingCity}},
                <strong>To:</strong>{{endingCity}},
                <strong>Fare:</strong>{{fare}}
            </li>
        </ul>
        
        
    
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        
            <p>
                <button @click.prevent="fetchData">
                    Try Again
                </button>
            </p>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    
    export default {
       data() {
            return {
                loading: false,
                journeys: null,
                error: null,
            };
       },

        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.journeys = null;
                this.loading = true;
                axios
                    .get('/api/journeys')
                    .then(response => {
                        this.loading = false;
                        this.journeys = response.data.data;
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
            }
        }
       
    }
</script>

<style scoped>

</style>