<template>
    <div>
        <nav>
            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'journey'}">Journey</router-link>
            <router-link :to="{ name: 'confirmation' }">Confirmation</router-link>
            <router-link :to="{ name: 'message' }">Message</router-link>
            <router-link :to="{ name: 'parent' }">Parent</router-link>
            <router-link :to="{ name: 'swipe' }">Swipe</router-link>
            <router-link :to="{ name: 'users' }">Users</router-link>
            <router-link :to="{ name: 'user', params: { userId: 1} }">User One</router-link>
            <router-link :to="{ name: 'user', params: { userId: 2} }">User Two</router-link>
            
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