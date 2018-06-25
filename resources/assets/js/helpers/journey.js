export function addJourney(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/user/' + this.user_id + '/journey', this.$data)
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Incorrect Swipe Details");
            })
    })
}
