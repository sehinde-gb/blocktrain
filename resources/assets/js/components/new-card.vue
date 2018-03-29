<template>
    <div id="app">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <form @submit.prevent="onSubmitted">
                <div class="form-group">
                    <label for="content">
                        <b>Card</b>
                    </label>
                    <br>
                    <i> Add a new Card</i>
                    
                    <input name="balance" id="balance" class="form-control"  v-model="balance">
              
                    <input name="current_balance" id="current_balance" v-model="current_balance" class="form-control">

                </div>
        
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

        export default {
            data() {
                return {
                    balance: '',
                    current_balance: '',
                    cardContent: ''
                }
            },
            methods: {
                onSubmitted() {
                    axios.post('https://blocktrain.test/api/card',
                        {content: this.cardContent})
                        .then((response) => {
                            window.location.href = "/";
                        })
                        .catch ((error) => console.log(error)
                        )}
            }
        }
    
</script>

<style scoped>
    #content {
        margin-top: 40px;
    }
</style>