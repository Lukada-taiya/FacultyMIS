<template>
    <div v-if="customThreads.length != 0" class="flex-1 flex flex-col">
        <!-- message -->

        <div
            @click="openRequest(thread.id)"
            v-for="thread in customThreads"
            :key="thread.id"
            class="cursor-pointer flex items-center shadow-xs transition-all duration-300 ease-in-out p-5 hover:shadow-md"
        >
            <div class="w-10 h-10 overflow-hidden rounded-md">
                <img
                    class="img-responsive"
                    src="img/user.svg"
                    :alt="thread.sender.name"
                />
            </div>
            <h1 class="ml-3 text-sm text-gray-500">
                {{ thread.sender.name }}
            </h1>
            <p class="ml-6 flex-1 text-sm text-gray-500">
                {{ thread.subject }}
            </p>
            <span
                :class="
                    messageType(thread.sender.id) === 'Sent:'
                        ? 'text-red-700'
                        : 'text-green-700'
                "
                class="px-2 py-1 rounded-md text-sm font-bold"
                v-text="messageType(thread.sender.id)"
            ></span>
            <p class="text-sm text-gray-500">
                {{ thread.created_at }}
            </p>
        </div>
        <!-- message -->
    </div>
    <div class="text-sm text-gray-500 text-center" v-else>
        You have no requests yet. Click Compose to create a new request.
    </div>
</template>
<script>
import { Link, router, usePage } from "@inertiajs/vue3";
export default {
    components: { Link },
    props: { customThreads: Object },
    data() {
        return {
            user: usePage().props.auth.user,
        };
    },
    methods: {
        openRequest(id) {
            router.get("/requests/" + id);
        },
        messageType(id) {
            if (this.user.id === id) {
                return "Sent:";
            } else {
                return "Received:";
            }
        },
    },
};
</script>
