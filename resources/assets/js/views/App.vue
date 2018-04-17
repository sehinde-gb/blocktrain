<template>
    <div>
        <nav>
            <router-link :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'swipe'}">Swipe</router-link>
            <router-link :to="{ name: 'cards' }">Card</router-link>
            <router-link to="/route-one/route-one-child">Link to route one, child one</router-link>
            
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
    .listing-summary {
        position: relative;
    }

@media (max-width: 400px) {
    .listing-summary .listing-save {
        left: 15px;
        right: auto;
    }
}
</style>