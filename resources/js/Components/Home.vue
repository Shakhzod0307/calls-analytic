<template>

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a :href="undefined" @click.prevent="$router.push('/')" class="flex ms-2 md:me-24">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="Call Analysis" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Call Analysis</span>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"  @click.prevent="$router.push('/')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" @click="logout" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 b mt-14 antialiased font-sans bg-gray-200">
            <!-- component -->
            <div class="container mx-auto px-4 sm:px-8">
                <div class="py-8">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold leading-tight">Calls

                        </h2>
                        <span v-if="ratingVisible"
                              :class="[
                                'font-semibold leading-tight border rounded-full py-1 px-2',
                                ratingUpdate ? 'border-green-400 text-green-500' : '',
                                isFading ? 'opacity-0 transition-opacity duration-2000' : 'opacity-100'
                              ]">
                            {{ ratingUpdate }}
                        </span>
                    </div>
                    <div class="my-2 flex sm:flex-row flex-col">
                        <div class="flex flex-row mb-1 sm:mb-0 gap-1">
                            <div class="relative">
                                <select
                                    v-model="selectNumber"
                                    class="appearance-none  h-full rounded-l border block appearance-none  bg-white border-gray-400 text-gray-700 py-2 px-8 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option :value="10">10</option>
                                    <option :value="50">50</option>
                                    <option :value="100">100</option>
                                </select>
                            </div>
                            <div class="relative">
                                <select v-model="selectYear"
                                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                    <option :value="0">Year</option>
                                    <option :value="2024">2024</option>
                                    <option :value="2023">2023</option>
                                    <option :value="2022">2022</option>
                                    <option :value="2021">2021</option>
                                    <option :value="2020">2020</option>
                                    <option :value="2019">2019</option>
                                    <option :value="2018">2018</option>
                                    <option :value="2017">2017</option>
                                    <option :value="2016">2016</option>
                                    <option :value="2015">2015</option>
                                    <option :value="2014">2014</option>
                                    <option :value="2013">2013</option>
                                    <option :value="2012">2012</option>
                                    <option :value="2011">2011</option>
                                    <option :value="2010">2010</option>
                                </select>

                            </div>
                            <div class="relative">
                                <select
                                    v-model="selectMonth"
                                    class="appearance-none  h-full rounded-l border block appearance-none bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option :value="0" >Month</option>
                                    <option :value="1">January</option>
                                    <option :value="2">February</option>
                                    <option :value="3">March</option>
                                    <option :value="4">April</option>
                                    <option :value="5">May</option>
                                    <option :value="6">June</option>
                                    <option :value="7">July</option>
                                    <option :value="8">August</option>
                                    <option :value="8">August</option>
                                    <option :value="9">September</option>
                                    <option :value="10">October</option>
                                    <option :value="11">November</option>
                                    <option :value="12">December</option>
                                </select>

                            </div>

                            <div class="relative">
                                <div class="custom-dropdown">
                                    <button class="dropdown-toggle" @click="toggleDropdown">
                                       {{ selectedDay ? selectedDay : 'Day' }}
                                    </button>
                                    <div v-if="isDropdownOpen" class="dropdown-options">
                                        <div class="options-grid">
                                            <div
                                                v-for="day in days"
                                                :key="day"
                                                class="option"
                                                @click="selectDay(day)"
                                            >
                                                {{ day }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <vue-tailwind-datepicker
                                v-model="dateStart"
                                placeholder="Select Dates"
                                separator=" to "
                                :shortcuts="false"
                            />
                            </div>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Agent
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        User
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Duration
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Started_at
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Ended at
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Rating
                                    </th>
                                </tr>
                                </thead>
                                <tbody >
                                <tr v-for="(call, index) in Calls"
                                    :key="call.id">
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{index+1}}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ call.agent.name }}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{call.user.name}}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{call.title}}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <span
                                            :class="{
                                                'relative inline-block px-3 py-1 font-semibold leading-tight': true,
                                                'text-blue-900 bg-blue-200': call.status === 'pending',
                                                'text-yellow-900 bg-yellow-200': call.status === 'in_progress',
                                                'text-green-900 bg-green-200': call.status === 'completed',
                                                'text-red-900 bg-red-200': call.status === 'cancelled'
                                            }">
                                            <span aria-hidden class="absolute inset-0 opacity-50 rounded-full"></span>
                                            <span class="relative">{{ call.status }}</span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{call.type}}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{call.duration}} min</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{call.started_at}}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{call.ended_at}}</p>
                                    </td>
                                    <td class="px-5 py-5 bg-white text-lg">
                                        <div class="flex items-center">
                                            <span
                                                v-for="star in [1, 2, 3, 4, 5]"
                                                :key="star"
                                                class="cursor-pointer"
                                                :class="{ 'text-yellow-500': star <= call.rating.rating, 'text-gray-400': star > call.rating.rating }"
                                                @click="updateRating(call, star)"
                                            >
                                                ★
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { useRouter } from 'vue-router';
import {onMounted, ref, watch} from "vue";
import axios from "axios";
import VueTailwindDatepicker from "vue-tailwind-datepicker";

const router = useRouter();
const Calls = ref();
const ratingUpdate = ref(null);
const ratingVisible = ref(false);
const isFading = ref(false);
const selectNumber = ref(10);
const selectYear = ref(0);
const selectMonth = ref(0);// 1-12
const selectedDay = ref(0);
const isDropdownOpen = ref(false);
const days = [0 ,1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]

const dateStart = ref({
    StartDate:'',
    EndDate:'',
});
const formatter = ref({
    date: 'DD',
    month: 'MMM',
    year: 'YYY',
});


const token = localStorage.getItem('token');
const logout = async () => {
    try {

        await axios.post('/api/logout', {}, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('token_expiry');
        router.push({ name: 'Login' });
    } catch (err) {
        console.error('Logout failed:', err);
    }
};
function toggleDropdown() {
    isDropdownOpen.value = !isDropdownOpen.value;
}
function selectDay(day) {
    selectedDay.value = day;
    isDropdownOpen.value = false;
}
const GetAllCalls = async () => {
    try {
        const calls = await axios.get(`/api/calls/${selectNumber.value}/${selectYear.value}/${selectMonth.value}/${selectedDay.value}`);
        Calls.value = calls.data.result;
        // console.log(selectYear.value, calls.data.result);
    } catch (error) {
        console.error("Failed to fetch messages:", error);
    }
};
const GetAllCallsByDates = async () => {
    const formatDate = (datetime) => {
        return datetime.split(' ')[0]
    }
    try {
        if (!dateStart.value) {
            console.error("Please select both start and end dates.");
            return;
        }
        const formattedStartDate = formatDate(dateStart.value.StartDate)
        const formattedEndDate = formatDate(dateStart.value.EndDate)
        const calls = await axios.get(`/api/callsByDate`, {
            params: {
                selectNumber: selectNumber.value,
                dateStart:formattedStartDate,
                dateEnd:formattedEndDate,
            },
        });
        Calls.value = calls.data.result;
        // console.log(selectNumber.value, formattedStartDate,formattedEndDate);

    } catch (error) {
        console.error("Failed to fetch messages:", error);
    }
};

const updateRating = async (call, newRating) => {
    const oldRating = call.rating.rating;
    call.rating.rating = newRating;

    try {
        const response = await axios.post(`/api/calls/${call.id}/rating`, { rating: newRating },{
            headers: {
                Authorization: `Bearer ${token}`
            }
        });
        if (response.status ===200){
            ratingUpdate.value = response.data.result;
            ratingVisible.value = true;
            isFading.value = false;
            setTimeout(()=>{
                isFading.value = true;
                setTimeout(()=>{
                    ratingVisible.value = false;
                },4000)
            },2000)
        }
        // console.log(`${response.data.result} Call ID ${call.id}: ${newRating}`);
    } catch (error) {
        console.error('Error updating rating:', error);
        call.rating.rating = oldRating;
    }
};

onMounted(()=>{
    GetAllCalls();
    // GetAllCallsByDates();
})
watch(
    [selectNumber, selectYear,selectMonth,selectedDay,dateStart],
    ([newSelectNumber, newSelectYear,newSelectMonth,newSelectedDay,newDateStart]) => {
        if (newSelectNumber || newSelectYear || newSelectMonth || newSelectedDay) {
            GetAllCalls(newSelectNumber, newSelectYear,newSelectMonth,newSelectedDay);
        }else {
            GetAllCallsByDates(newSelectNumber,newDateStart);
        }
    }
);
</script>
<style scoped>
.custom-dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    background-color: white;
    border: 1px solid #ccc;
    padding:8px 15px;
    cursor: pointer;
    width: 100%;
    text-align: left;
}

.dropdown-options {
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    z-index: 1;
    width: 300px;
    max-height: 200px;
    overflow-y: auto;
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 5px;
    padding: 10px;
}

.option {
    padding: 10px;
    border: 1px solid #ccc;
    cursor: pointer;
    text-align: center;
}

.option:hover {
    background-color: #f0f0f0;
}

</style>
