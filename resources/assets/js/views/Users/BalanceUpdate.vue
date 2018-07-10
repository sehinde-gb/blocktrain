<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <form method="post"  @submit.prevent="topUp">
                            <h6>Zorra Card Number: {{ user.id}} </h6>
                            <h6>Current Balance: {{ user.balance }}</h6>
                            <p>You are about to top up pay as you go credit  for the card listed above.</p>
                            <div class="form group row">
                                    <select v-model="balance" id="balance">
                                        <option value="1000">£10</option>
                                        <option value="2000">£20</option>
                                        <option value="2500">£25</option>
                                        <option value="3000">£30</option>
                                        <option value="4000">£40</option>
                                        <option value="5000">£50</option>
                                    </select>

                                        
                                        <span class="city-span">{{ balance }}</span>

                                        
                            </div><!-- /.form group row -->

                            <div class="row">
                                
                                <button :disabled="errors.any()" type="submit" class="btn btn-primary btn-lg" id="submit" @click.prevent="topUp">Top Up</button>
                            
                                <div class="col-sm"></div>
                            </div><!-- /.row -->

                        </form>
                    </div><!-- end of .lead-form -->                  
                </div><!-- /.col-8 -->
                 <SideMenu></SideMenu>
            </div><!-- /.row -->
        
        </div> <!-- end of .container -->
   
    </div>
</template>

<script>
import SideMenu from './SideMenu.vue';

export default {
    components: { SideMenu},

    

    created() {
            //this.fetchUserList();
             this.$store.dispatch( 'loadUser', {
                id: this.$route.params.id
            });
    }, 
    computed: {
        user() {
                return this.$store.getters.getUser;
        },

    }, 

    data() {
        return {
                user_id: this.$route.params.id,
                
                balance: ''
            
        }
    },
    
    
    methods: {
        
        topUp() {
             this.$store.dispatch('addBalance', {
                 user_id: this.user_id,
                 balance: this.balance
             })   

        }

        

       
    }

    

}

</script>