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
                                <h3>{{ thread["subject"] }}</h3>
                            </div>
                            <div>
                                <a
                                    v-if="approved === 'null'"
                                    class="text-white bg-green-500 rounded-md p-2 px-6 inline-block w-24"
                                    :href="
                                        route('requests.create', {
                                            thread: thread['id'],
                                            user: sender.id,
                                        })
                                    "
                                    >Reply</a
                                >
                                <a
                                    v-else-if="approved === 'false'"
                                    class="text-white bg-yellow-600 rounded-md p-2 px-4 inline-block w-24"
                                    :href="
                                        route('requests.approve', {
                                            thread: thread['id'],
                                            remark: remark,
                                        })
                                    "
                                    >Approve</a
                                >
                                <button
                                    disabled
                                    v-else-if="approved === 'true'"
                                    class="disabled text-white bg-yellow-500 hover:cursor-pointer rounded-md p-2 px-4 inline-block w-24"
                                >
                                    Approved
                                </button>
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
                                        {{ thread["created_at"] }}
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="my-5">
                                <iframe
                                    class="w-full h-wide"
                                    :src="
                                        route('requests.view', {
                                            data: request,
                                        })
                                    "
                                ></iframe>
                                <!-- {{ message }} -->
                            </div>
                            <div class="mt-8" v-if="!!this.remarks">
                                <div class="font-bold text-sm mb-4">
                                    Remarks
                                </div>
                                <div
                                    class="my-3 text-white p-4 rounded-lg w-1/2 bg-gray-600 text-sm"
                                    v-for="rem of remarks"
                                >
                                    <div
                                        class="flex justify-between font-bold mb-2"
                                    >
                                        <div>
                                            {{ rem.sender.name }}
                                        </div>
                                        <div>{{ rem.date_created }}</div>
                                    </div>
                                    <div>
                                        {{ rem.body }}
                                    </div>
                                </div>
                            </div>
                            <div v-if="approved !== 'null'">
                                <label
                                    class="font-bold text-sm mb-8"
                                    for="remark"
                                    >Add Remark</label
                                >
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                >
                                    <textarea
                                        v-model="remark"
                                        class="block border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Add a remark..."
                                        name="remark"
                                        id="remark"
                                        cols="30"
                                        rows="5"
                                    ></textarea>
                                </div>
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
    props: {
        thread: Object,
        sender: Object,
        remarks: Object,
        request: String,
        approved: String,
    },
    components: {
        AppLayout,
        router,
    },
    data() {
        return {
            remark: "",
        };
    },
    methods: {
        returnBack() {
            router.get("/requests");
        },
    },
};
</script>
