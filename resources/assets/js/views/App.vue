<template>
    <div>
        <nav>
            <router-link :to="{ name:'home' }">Home</router-link>
            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
            <router-link :to="{ name: 'card.register' }">Card Register</router-link>
            <router-link :to="{ name: 'card.listings' }">View Cards</router-link>
        </nav>
        <div id="app">
           
            <app-header></app-header>
            <transition name="slide">
                <router-view :key="$route.fullPath"></router-view>
            </transition>
            <app-footer></app-footer>
           
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
                title: "Block Train",
                id: this.$route.params.id
              
            }
        },
        components: {
          
            'app-header': Header,
            'app-footer': Footer
            
        }
        
    }
</script>

<style>
    .slide-leave-active {
        transition: opacity 1s ease;
        opacity: 0;
        animation: slide-out 1s ease-out forwards;
    }
    
    .slide-leave {
        opacity: 1;
        transform: translateX(0);
    }
    
    .slide-enter-active {
        animation: slide-in 1s ease-out forwards;
    }
    
    @keyframes slide-out {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-30px);
        }
    }
    
    @keyframes slide-in {
        0% {
            transform: translateY(-30px);
        }
        100% {
            transform: translateY(0);
        }
    }
</style>