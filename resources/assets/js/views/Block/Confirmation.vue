<template>
    <div>
        


        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="lead-form">
                        <br>
                      
                            <hr/>
                            <h1 class="title">Your Journey</h1>
                            <h4>Journey ID: {{ journeyId }}</h4>

                             <div class="form-group">
                                <label for="description">From</label>
                                <input class="form-control" placeholder="Origin" type="text" v-model="from">
                             </div>

                            <div class="form-group">
                                <label for="description">To</label>
                                <input class="form-control" placeholder="Destination" type="text" v-model="to">
                            </div>

                            <div class="form-group">
                                <label for="description">Ending Fare</label>
                                <input class="form-control" placeholder="EndingFare" type="text" v-model="endingFare">
                            </div>

                            <button class="btn btn-primary"  @click="performSubmit">Save</button>
                            <strong v-show="submitting">Submitting...</strong>
                            <strong v-show="errorSubmit" class="text-danger">Error occurred!</strong>
                            <strong v-show="successSave" class="text-success">Tx submitted!</strong>
                    </div>

                        <br>
                        <div class="col-8">
                        <h3>Info</h3><hr>

                        <p>
                            <strong>Transaction Address</strong>: {{ coinbase }}
                        </p>
                        <p>
                            <strong>Balance</strong>: {{ balance }} ETH
                        </p>
                        </div>     
                </div><!-- end of .row -->
               <SideMenu></SideMenu>
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->

    </div>
</template>

<script>
    // importing common function
    import mixin from '../../../../../libs/mixinViews';
    import SideMenu from '../Users/SideMenu.vue';

    /**
     * Profile view component: this component shows the journey profile.
     * In this page the journey can update his own profile and he can
     * view other details like his wallet address and balance.
     */
    export default {

        components: { SideMenu},
        mixins: [mixin],

        data() {
            return {
                from: '', // variable binded with the from's input field
                to: '', // variable binded to the to's input field
                endingFare: '', //variable binded to the endingFare's input field
                journeyId: 0, // journey ID from the blockchain

                coinbase: '0x0', // address of the journey
                balance: 0, // balance of the journey

                tmoConn: null, // contain the intervalID given by setInterval

                submitting: false, // true when the submit is pressed
                successSave: false, // it show the success message
                errorSubmit: false, // it shows the erro message
            }
        },

       

        methods: {

            /**
             * Get the profile details of the journey.
             * This method calls the function getOwnProfile from the smart contract
             * and it returns the journey details where:
             *      journeyDet[0] => uint     journey ID
             *      journeyDet[1] => string   journey's from
             *      journeyDet[2] => string   journey's to
             */
            getProfile() {
                window.bc.contract().getOwnProfile((error, journeyDet) => {
                    this.journeyId = journeyDet[0].toNumber()
                    this.from = journeyDet[1]
                    this.to = journeyDet[2]
                    this.endingFare = journeyDet[3]
                })
            },

            /**
             * Updates the journey's details when the button is pressed.
             */
            performSubmit() {
                this.submitting = true
                this.errorSubmit = false;
                this.successSave = false;

                // calling the method updateJourney from the smart contract
                window.bc.contract().updateJourney(
                    this.from,
                    this.to,
                    this.endingFare,
                    {
                        from: window.bc.web3().eth.coinbase,
                        gas: 800000
                    },
                    (err, txHash) => {
                        this.handleSubmitResult(err, txHash)
                    }
                )
            },

            /**
             * Handle the result of the response of updateJourney.
             */
            handleSubmitResult(err, txHash) {
                this.submitting = false
                if (err) {
                    console.error(err)
                    this.errorSubmit = true;
                }
                else if (txHash) {
                    this.errorSubmit = false;
                    this.successSave = true;
                }
            },

            /**
             * It loads the general info (address and balance of the journey).
             */
            getInfoBc() {
                window.bc.loadInfo().then(info => {
                    this.coinbase = info.coinbase
                    this.balance = window.bc.weiToEther( info.balance )
                })
            },

            /**
             * It loads the journey information once connected to the blockchian
             */
            checkConnectionAndLoad() {
                if (this.blockchainIsConnected()) {
                    // stopping the interval
                    clearInterval(this.tmoConn)

                    this.loadEverything()
                }
            },

            /**
             * Load the journey's info: from, to and general info
             */
            loadEverything() {
                // checking if the journey is registered
                window.bc.contract().isRegistered.call((error, res) => {
                    if (error) {
                        console.error(error)
                        this.$router.replace("/")
                    }
                    // if the journey is registered it will load the profile page
                    else if (res) {
                        this.getProfile()
                        this.getInfoBc()
                    }

                    // if the journey not registered the user will be redirected to the Home page
                    else this.$router.replace("/")
                })
            }
        },

        created() {
            // it will call the function checkConnectionAndLoad every 500ms
            // until the connection to the blockchain is enstablished
            this.tmoConn = setInterval(() => {
                this.checkConnectionAndLoad()
            }, 500)
        }
    }
</script>