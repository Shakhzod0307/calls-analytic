import { createRouter, createWebHistory } from 'vue-router';
import Home from './Components/Home.vue'; // Correct the spelling of Components
import Login from './Components/Login.vue';

// Define your routes
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: { requiresAuth: true },
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
        // meta: { guest: true },
    },
];
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('token');
    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: 'Login' });
    } else if (to.meta.guest && isAuthenticated) {
        next({ name: 'Home' });
    } else {
        next(); // Proceed normally
    }
});

export default router;
