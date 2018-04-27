<template>
    <div>
        <nav>
            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'original'}">Original</router-link>
            <router-link :to="{ name: 'makejourney'}">Make Journey</router-link>
            <router-link :to="{ name: 'cards'}">Cards</router-link>
            <router-link :to="{ name: 'carddetail', params: { id: 'id'}}">Card Journeys</router-link>
            <router-link :to="{ name: 'users' }">Users</router-link>
            
            
        </nav>
        <div id="app">
            <app-header v-bind:title="title" v-on:changedTitle="updateTitle($event)"></app-header>
            <router-view></router-view>
            <app-footer v-bind:title="title" v-on:changedTitle="updateTitle($event)"></app-footer>
            
        </div><!-- /app -->
    </div>
</template>

<script>
    import Header from './Header.vue'
    import Footer from './Footer.vue'
    
    
    export default {
        data() {
            return {
                name: '',
                title: "Block Train Ninjas"
            }
        },
        methods: {
            alertName(name) {
                alert(name)
            },

            updateTitle: function(updatedTitle) {
                this.title = updatedTitle;
            }
        },

        components: {
          
            'app-header': Header,
            'app-footer': Footer
            
        }
        
    }
</script>

<style scoped>

</style>