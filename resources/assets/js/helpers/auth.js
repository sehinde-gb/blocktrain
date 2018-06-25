export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Incorrect email or password entered");
            })
    })
}



export function getLocalUser() {
    const userStr = localStorage.getItem("user");

    if(!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}


export function register(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/register', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Your Registration Details are Incomplete !");
            })
    })
}



export function enter(credentials) {
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
