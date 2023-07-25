<template>
    <AppLayout>
        <div>
            <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">All Users</h3>
                    <p class="mt-1 mb-5 text-sm text-gray-600">
                        Manage all the information of system users here
                    </p>
                </div>
                <div
                    class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                >
                    <div class="relative overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">
                                        Position
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="user in users.data"
                                    :key="user.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                >
                                    <td
                                        scope="row"
                                        class="px-6 py-4 font-medium whitespace-nowrap dark:text-white"
                                    >
                                        {{ user.id }}
                                    </td>
                                    <td class="px-6 py-4">{{ user.name }}</td>
                                    <td class="px-6 py-4">{{ user.email }}</td>
                                    <td class="px-6 py-4">Student</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="mt-6 display:inline-block">
                            <Component
                                v-for="link in users.links"
                                :is="link.url ? 'Link' : 'span'"
                                :href="link.url"
                                v-html="link.label"
                                class="px-2"
                                :class="{
                                    'text-gray-500': !link.url,
                                    'font-bold': link.active,
                                }"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
export default {
    components: { AppLayout, Link },
    props: { users: Object },   
};
</script>
