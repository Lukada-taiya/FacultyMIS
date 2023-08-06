<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    >
                        <div class="flex justify-between items-center h-12">
                            <div
                                @click="returnBack"
                                class="nb-1 cursor-pointer"
                            >
                                <span class="text-xl fad fa-arrow-left"></span>
                            </div>
                            <div class="ml-4">
                                <h3>{{ thread['subject'] }}</h3>
                            </div>
                            <div>
                                <a
                                    class="text-white bg-green-500 rounded-md p-2 px-6 inline-block w-24"
                                    :href="
                                        route('requests.create', {
                                            thread: thread['id'],
                                            user: sender.id,
                                        })
                                    "
                                    >Reply</a
                                >
                            </div>
                        </div>
                        <hr />
                        <div class="flex flex-col my-5">
                            <div class="flex justify-between">
                                <div class="flex">
                                    <h5 class="font-bold">From:</h5>
                                    <div class="ml-2">{{ sender.name }}</div>
                                </div>
                                <div class="flex">
                                    <h5 class="font-bold">Date:</h5>
                                    <div class="ml-2">
                                        {{ thread['created_at'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <iframe
                                    :src="
                                        'https://docs.google.com/gview?url=' +
                                        message +
                                        '&embedded=true'
                                    "
                                ></iframe>
                                <!-- {{ message }} -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router } from "@inertiajs/vue3";
export default {
    props: { thread: Array, sender: Object, message: String },
    components: {
        AppLayout,
        router,
    },
    methods: {
        returnBack() {
            router.get("/requests");
        },
    },
};
</script>
