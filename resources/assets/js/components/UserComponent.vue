<template>
    <div class="container">
        
        
        <div class="wrapper">
            <div class="row">
                
                    
                </form>
            </div><!-- /.row -->
            
        </div><!-- /.wrapper -->
    </div>
</template>

<script>
    export default {
        //mounted() {
           // axios.get('/passengers').then(response =>  response.data);
        //}

        data() {
            return {
                list: [],
                user: {
                    id: '',
                    firstName: '',
                    lastName: '',
                    email: ''
                }
            };
        },
        created() {
            this.fetchPassengerList();
        },

        methods: {
            fetchPassengerList() {
                axios.get('api/passengers').then((res) => {
                    this.list = res.data;
                });
            }
        }
    }
</script>
