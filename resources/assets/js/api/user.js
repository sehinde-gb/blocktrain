export default {

    /*
        GET     /api/users
    */
    getUsers: function() {
        return axios.get( '/api/user/' );
    },


    /*
        GET   /api/user/{user}
    */
    getUser: function(id) {
        return axios.get('/api/user/' + id);
    }
}    