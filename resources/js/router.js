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
        meta: { guest: true },
    },
];
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});
const isTokenExpired = () => {
    const tokenExpiry = localStorage.getItem('token_expiry');
    return tokenExpiry ? new Date().getTime() > tokenExpiry : true;
};

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('token');
    if (isAuthenticated) {
        if (isTokenExpired()) {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            localStorage.removeItem('token_expiry');
            next({ name: 'Login' });
        } else {
            next();
        }
    } else {
        if (to.meta.requiresAuth && !isAuthenticated) {
            next({ name: 'Login' });
        } else if (to.meta.guest && isAuthenticated) {
            next({ name: 'Home' });
        } else {
            next();
        }
    }
});

export default router;
