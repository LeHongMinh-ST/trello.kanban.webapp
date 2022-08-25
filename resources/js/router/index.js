import store from "../store"
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../pages/Login.vue')
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('../pages/Login.vue')
    },
    {
        path: '/admin',
        name: 'Admin',
        component: () => import('../pages/Login.vue')
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

// router.beforeEach((to, from, next) => {
//     if (to.name !== 'Login' && !store.state.auth.isAuthenticated) {
//         next({name: 'Login'})
//     } else if (to.name === 'Login' && store.state.auth.isAuthenticated && store.state.auth.authUser.role_id !== 1) {
//         next({name: 'Calendar'})
//     } else if (to.name === 'Login' && store.state.auth.isAuthenticated && store.state.auth.authUser.role_id === 1) {
//         next({name: 'Dashboard'})
//     } else {
//         next()
//     }
//     store.state.home.prevRoute = from
// })

export default router