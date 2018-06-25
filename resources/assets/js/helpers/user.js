export function getUsers(credentials) {
    return new Promise((res, rej) => {
        axios.get('/api/user')
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Incorrect  Details");
            })
    })
}


 