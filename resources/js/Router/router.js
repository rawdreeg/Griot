import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/login/Login'
import Signup from '../components/login/Signup'
import Logout from '../components/login/Logout'
import Discussion from '../components/discussion/Discussion'
import Discuss from '../components/discussion/Discuss'
import CreatePost from '../components/discussion/CreatePost'
import CreateHut from '../components/community/CreateHut'




Vue.use(VueRouter)

// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
     { 
         path: '/login', 
        component: Login 
     },
     { 
         path: '/signup', 
         component: Signup 
     },
     { 
        path: '/', 
        component: Discussion, 
     },
     { 
         path: '/discussion', 
         component: Discussion, 
         name:'discussion'
     },
     { 
        path: '/hut', 
        component: CreateHut, 
    },
     { 
        path: '/logout', 
        component: Logout
    },
    { 
        path: '/discussion/:slug', 
        component: Discuss,
        name: 'discuss'
    },
    { 
        path: '/submit', 
        component: CreatePost    
    },
  ]

// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router