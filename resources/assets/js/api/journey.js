export default {
    /*
        GET     /api/v1/user/{user}/journey
    */
    getJourneys: function(id) {
        return axios.get( '/api/user/' + this.id + '/journey' );
    },

    /*
        GET   /api/v1/user/{user}/journey/{journey}
    */
    getJourney: function( id, journey ) {
        return axios.get('/api/user/' + this.id + '/journey/' + this.journey);
    },

    /*
        POST  /api/v1/cafes
    */
    postAddNewJourney: function( from, startingCity, to, endingCity, description, type, passengerType, mode, endingFare ) {
        return axios.post('/api/user/' + this.id + '/journey',
        {
            from: from,
            startingCity: startingCity,
            to: to,
            endingCity: endingCity,
            description: description,
            type: type,
            passengerType: passengerType,
            mode: mode,
            endingFare: endingFare

        });
    }    
    
}




