
import HomePage from './views/Home/Home'
import OriginalPage from './views/Original/OriginalPage'
import Register from './views/Auth/Register'
import CreateJourney from './views/Journeys/CreateJourney'
import CardListings from './views/Cards/CardListings'
import CardDetail from './views/Cards/CardDetail'
import JourneyListings from './views/Journeys/JourneyListings'
import JourneyDetail from './views/Journeys/JourneyDetail'
import CardRegister from './views/Cards/CardRegister'
import Login from './views/Auth/Login'


export const routes = [


    {
        path: '/',
        name: 'home',
        component: HomePage,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/login',
        name: 'login',
        component: Login
    },




    {
        path: '/original',
        name: 'original',
        component: OriginalPage,
    },

    {
        path: '/cards/register',
        name: 'card.register',
        component: CardRegister,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/cards',
        name: 'card.listings',
        component: CardListings,
        meta: {
            requiresAuth: true
        }
    },

    {   path: '/cards/:id',
        name: 'card.detail',
        component: CardDetail,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/cards/:id/journeys',
        name: 'journey.listings',
        props: true,
        component:JourneyListings,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/cards/:id/journey/:journey',
        name: 'journey.detail',
        component:JourneyDetail,
        meta: {
            requiresAuth: true
        }
    },


    {   path: '/cards/:id/create/journey',
        name: 'journey.create',
        props: true,
        component: CreateJourney,
        meta: {
            requiresAuth: true
        }
    },


    {
        path: '/register',
        name: 'register',
        component: Register

    },



];