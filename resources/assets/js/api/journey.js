export default {
    /*
        GET     /api/user/{user}/journey
    */
    getJourneys: function(user_id) {
        return axios.get( '/api/user/' + '1' + '/journey' );
    },

    /*
        GET   /api/user/{user}/journey/{journey}
    */
    getJourney: function( user_id,  journey ) {
        return axios.get('/api/user/' + this.user_id + '/journey/' + this.journey);
    },

    /*
        POST  /api/user/{user}/make/journey/
    */
    postAddNewJourney: function( user_id, from,  startingCity, to, endingCity, description, type, passengerType, mode, endingFare) {
        return axios.post('/api/user/' + this.user_id + '/journey',
        {
            user_id: user_id,
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




