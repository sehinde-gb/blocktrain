<template>
    <app-summary v-bind:starts="starts"></app-summary>
</template>

<script>
    import Summary from './Summary.vue'
    
    export default {
        components: {
            'app-summary': Summary

        },
        created() {
            this.fetchStartList();
            
        },
        data() {
            return {
                starts: []
            }
        },
        methods: {
            fetchStartList() {
                this.error = this.starts = null;
                this.loading = true;
                this.$http.get('/api/starts').then(response => this.starts = response.data);
            },

            deleteStart(id) {
                this.$http.delete('api/start/' + id)
                    .then((response) => {
                        this.fetchStartList()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>

<style scoped>

</style>