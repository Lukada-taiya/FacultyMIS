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
