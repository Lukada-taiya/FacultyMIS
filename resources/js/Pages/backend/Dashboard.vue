<script>
import AppLayout from "@/Layouts/AppLayout.vue"; 
export default {
    props: { auth: Object},
    components: { AppLayout }
}
</script>

<template> 
    <AppLayout> 
        <div class="bg-gray-100 flex-1 p-6 md:mt-16 grid grid-cols-8">
            <div class="col-span-6 col-start-2 p-6 bg-white shadow-sm mt-16" >
                <h3 class="font-bold">Welcome, {{ auth.user.name }}</h3>
                <div class="my-6 flex justify-between space-y-5 space-x-5">
<div v-if="can('read requests')">
                    <Link :href="route('requests.index')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Requests</Link>
                      </div>
                      
<div v-if="can('read departments')">
                    <Link :href="route('departments.index')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Departments</Link>
                      </div>
<div v-if="can('read programmes')">
                    <Link :href="route('programmes.index')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">programmes</Link>
                      </div>
                 <div v-if="can('read courses')">
                    <Link :href="route('courses.index')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">courses</Link>
                      </div>
                    <div v-if="can('manage notices')">
                    <Link :href="route('notices.index')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Notices</Link>
                      </div>
<div v-if="can('manage contacts')">
                    <Link :href="route('contacts.index')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Contacts</Link>
                      </div>
                  
                </div>
            </div> 
        </div>
        <!-- <AppLayout title="Dashboard"> -->
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div> -->
    </AppLayout>
</template>
