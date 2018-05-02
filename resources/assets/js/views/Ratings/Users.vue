<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Users</h2>
                <ul class="list-group" v-if="userList">
                    <li class="list-group-item"
                        :class="{active: selectedUser && user.id === selectedUser.id}"
                        v-for="user in userList"
                        @click="setSelectedUser(user)">
                        {{user.name}} ({{user.rating}})
                    
                    </li>
                </ul>
            </div>
            <div class="col">
                <user-rating v-if="selectedUser" :selectedUserRating="selectedUser.rating"
                             v-on:ratingUpdated="changeDisplayedRating"></user-rating>
            </div>
        </div>
    </div>
</template>

<script>
    import Rating from './Rating';

    const userList = {
        1: {
            "id": 1,
            "name": "Leanne Graham",
            "username": "Bret",
            "rating": 3,
        },
        2: {
            "id": 2,
            "name": "Ervin Howell",
            "username": "Antonette",
            "rating": 2,
        },
        3: {
            "id": 3,
            "name": "Clementine Bauch",
            "username": "Samantha",
            "rating": 5,
        }
    }
    
    export default {
            
            data() {
                return {
                    userList: {},
                    selectedUser: null
                }
            },
            mounted() {
                this.userList = this.getUsers()
            },
            methods: {
                setSelectedUser(user) {
                    this.selectedUser = user
                },
                changeDisplayedRating(val) {
                    this.userList[this.selectedUser.id].rating = val
                },
                getUsers() {
                    return {... userList}
                }
            },
            components: {
                'user-rating': Rating
            }
        

    }
</script>

<style scoped>
    #app {
        max-width: 800px;
        margin: auto;
        padding: 2rem;
    }
    
    .mainBody {
        height: 500px;
        padding-top:50px;
    }
    
    .content {
        padding-top: 40px;
    }
    
    .list-group-item:hover {
        cursor: pointer;
    }
</style>