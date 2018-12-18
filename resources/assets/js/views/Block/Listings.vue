<template>
	<div>
		<button class="btn btn-primary float-right btn-top" @click="reloadList">Reload</button>
        <h1 class="title">Journey Block List</h1>

        <div class="clearfix"></div>

        <h2 v-show="!bcConnected">Not connect to the blockchain: please wait.</h2>

        <h2 v-show="(isLoading && bcConnected)">Loading...</h2>

        <table class="table table-striped" v-show="!isLoading">
            <thead class="thead-dark">
                <tr>
                    <th>Journey ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Ending Fare</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="journey in journeys">
                    <td>{{ journey[0].toNumber() }}</td>
                    <td>{{ journey[1] }}</td>
                    <td>{{ journey[2] }}</td>
                     <td>{{ journey[3] }}</td>
                    <td>{{ toAscii(journey[4]) }}</td>
                    <td>{{ toDate( journey[5].toNumber() ) }}</td>
                    <td>{{ toDate( journey[6].toNumber() ) }}</td>
                </tr>
            </tbody>
        </table>

        <a class="btn btn-primary btn-lg" role="button"><router-link to="/users">Dashboard</router-link></a>
    </div>
</template>

<script>
    // importing common function
    import mixin from '../../../../../libs/mixinViews';

    /**
     * List view component: this component shows list of the registered journeys
     * and their statuses.
     */
    export default {
        mixins: [mixin],

        data() {
            return {
                journeys: [], // array that stores all the registered journeys
                isLoading: true, // true when the journey list is loading form the blockchain
                bcConnected: false, // blockchain is connected ()
                tmoConn: null, // contain the intervalID given by setInterval
            }
        },

        methods: {
            /**
             * Get the list of the registered journeys once the connection to the
             * blockchain is established.
             */
            getJourneyList() {
                if (this.blockchainIsConnected()) {
                    // it shows the loading message
                    this.isLoading = true

                    // stopping the interval
                    clearInterval(this.tmoConn)

                    // getting all the journeys from the blockchain
                    this.getAllJourneys(journeyProfile => {
                        this.isLoading = false
                        this.journeys.push(journeyProfile)
                    })
                }
            },

            /**
             * It reloads the journey list.
             */
            reloadList() {
                this.journeys = []

                this.getJourneyList()
            },

			/**
			 * Get all journeys.
			 */
			getAllJourneys(callback) {
				// getting the total number of journeys stored in the blockchain
				// calling the method totalJourneys from the smart contract
				window.bc.contract().totalJourneys.call((err, total) => {
					var tot = 0
					if (total) tot = total.toNumber()

					if (tot > 0) {
						// getting the journey one by one
						for (var i=1; i<tot; i++) {

							window.bc.contract().getJourneyById.call(i, (error, journeyProfile) => {
								callback(journeyProfile)
							})

						} // end for
					} // end if

				}) // end totalJourneys call
			}
        },

        created() {
            // it tries to get the journey list from the blockchian once
            // the connection is established
            this.tmoConn = setInterval(() => {
                this.getJourneyList()
            }, 1000)
        }
    }
</script>

<style>
	.btn-top {
		margin-top: 10px;
	}
</style>
