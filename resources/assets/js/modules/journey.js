/*
|-------------------------------------------------------------------------------
| VUEX modules/modules.js
|-------------------------------------------------------------------------------
| The Vuex data store for the journeys
*/

import JourneyAPI from '../api/journey.js';

export const journeys = {
    /*
    Defines the state being monitored for the module.
    */
    
    state: {
        journeys: [],
        journeysLoadStatus: 0,

        journey: {},
        journeyLoadStatus: 0
    },

    /*
    Defines the actions used to retrieve the data.
    */
    actions: {
        /*
        Load the journeys from the API
        */
        loadJourneys( { commit }){
            commit('setJourneysStatus', 1);    
     

        JourneyAPI.getJourneys()
            .then(function(response) {
                commit('setJourneys', response.data);
                commit('setJourneysLoadStatus', 2);
            })
            .catch(function(){
                commit('setJourneys', []);
                commit('setJourneysLoadStatus', 3);
            });
        },
        
        /*
            Loads an individual journey from the API
        */
        loadJourney({ commit}, data) {
            commit('setJourneyLoadStatus', 1);

            JourneyAPI.getJourney(data.id)
                .then(function(response) {
                    commit('setJourney', response.data);
                    commit('setJourneyLoadStatus', 2);
                })
                .catch(function() {
                    commit('setJourney', {});
                    commit('setJourneyLoadStatus', 3);
                });
        }
        
    },


    /*
    Defines the mutations used
    */
    mutations: {
        /*
            Sets the journeys load status
        */
        setJourneysLoadStatus( state, status) {
            state.setJourneysLoadStatus = status;
        },

        /*
            Sets the journeys
        */

        setJourneys(state, journeys) {
            state.journeys = journeys;    
        },

        /*
            Sets the journey load status
        */
        setJourneyLoadStatus( state, status) {
            state.journeyLoadStatus = status;
        },

        /*
            Sets the journey
        */
        setJourney( state, journey) {
            state.cafe = cafe;
        }
    },

    /*
        Defines the getters used by the module
    */

    getters: {
        /*
            Returns the journeys load status.
        */    
        getJourneysLoadStatus( state) {
            return state.getJourneysLoadStatus;
        },

         /*
            Returns the journeys.
        */   

        getJourneys(state) {
            return state.journeys;
        },

         /*
            Returns the journey load status.
        */   

        getJourneyLoadStatus( state) {
            return state.journeyLoadStatus;
        },

         /*
            Returns the journey.
        */   

        getJourney(state) {
            return state.journey;
        }
    }

}