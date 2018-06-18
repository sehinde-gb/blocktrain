export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Wrong email or password");
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

export function getLocalCard() {
    const cardStr = localStorage.getItem("card");

    if(!cardStr) {
        return null;
    }

    return JSON.parse(cardStr);
}


export function register(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/register', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Incorrect Registration Details");
            })
    })
}


export function swipe(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/card/' + this.card_id + '/journey', this.$data)
            .then((response) => {
                res(response.data);
            })
            .catch((err) =>{
                rej("Incorrect Swipe Details");
            })
    })
}
