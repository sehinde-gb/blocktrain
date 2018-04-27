<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h1>Card Listings</h1>
                        
                    </div>
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div>
</template>

<script>
    export default {

        created() {
            this.fetchCardList();
        },

        data() {
            return {
                id: this.$route.params.id,
                cards: []
            }

        },
        methods: {
            fetchCardList() {

                this.$http.get('/api/cards/' + this.id + '/journeys').then((response) => {
                    //console.log(response.data.data);
                    this.cards = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>