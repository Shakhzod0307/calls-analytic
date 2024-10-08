<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded shadow">
            <h2 class="text-2xl font-bold text-center text-gray-700">Admin Login</h2>
            <form @submit.prevent="LoginSubmit">
                <div>
                    <label for="email" class="block mb-3 text-sm font-medium text-gray-700">Email Address</label>
                    <input
                        class="w-full px-3 py-2 mt-1 border rounded focus:outline-none focus:ring"
                        type="email"
                        id="email"
                        v-model="email"
                        :class="{ 'border-red-500': showErrorEmail }"
                        required
                    />
                </div>

                <div>
                    <label for="password" class="block text-sm mt-4 mb-3 font-medium text-gray-700">Password</label>
                    <input
                        class="w-full px-3 py-2 mt-1 border rounded focus:outline-none focus:ring"
                        type="password"
                        id="password"
                        v-model="password"
                        :class="{ 'border-red-500': showErrorPassword }"
                        placeholder="********"
                        required
                    />
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full px-4 mt-5 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50"
                    >
                        <span>Login</span>
                    </button>
                </div>

                <div v-if="loginError" class="mt-4 text-red-500">{{ loginError }}</div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref } from "vue";
import axios from 'axios';

const router = useRouter();
const email = ref('');
const password = ref('');
const showErrorEmail = ref(false);
const showErrorPassword = ref(false);
const loginError = ref('');

const LoginSubmit = async () => {
    showErrorEmail.value = !email.value;
    showErrorPassword.value = !password.value;
    loginError.value = '';
    if (showErrorEmail.value || showErrorPassword.value) {
        return;
    }
    try {
        const response = await axios.post('/api/login', {
            email: email.value,
            password: password.value
        });
        // console.log(response.data);
        const token = response.data.token;
        const user = response.data.user;
        if (user.role !== 'admin') {
            loginError.value = 'You do not have permission to access this area.';
            return;
        }
        if (token) {
            const expiresIn = 36000;
            const expirationTime = new Date().getTime() + expiresIn;
            localStorage.setItem('token', token);
            localStorage.setItem('user', JSON.stringify(user));
            localStorage.setItem('token_expiry', expirationTime);
            await router.push({ name: 'Home' });
        } else {
            console.error('Token not received');
        }
    } catch (error) {
        console.error('Login failed:', error);
        loginError.value = 'Login failed. Please check your credentials.';
    }
};
</script>
