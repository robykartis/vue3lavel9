import { createWebHistory, createRouter } from "vue-router";
import Home from '../pages/Home.vue'
import Register from '../pages/Register.vue'
import Login from '../pages/Login.vue'
import Dashboard from '../pages/Dashboard.vue'

export const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name :'Register',
        path: '/register',
        component:Register
    },
    {
        name :'Login',
        path:'/login',
        component: Login
    },
    {
        name:'Dashboard',
        path:'/dashboard',
        component:Dashboard
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes:routes
})
export default router
