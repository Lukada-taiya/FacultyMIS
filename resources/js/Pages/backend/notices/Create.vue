<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            Make New Notice
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Create a notice for all to see on the notice board
                            page
                        </p>
                    </div>
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    >
                        <div>
                            <form
                                @submit.prevent="submit()"
                                enctype="multipart/form-data"
                            >
                                <div class="space-y-12">
                                    <div
                                        class="border-b border-gray-900/10 pb-12"
                                    >
                                        <div
                                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                        >
                                            <div class="sm:col-span-4">
                                                <label
                                                    for="title"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Title</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="form.title"
                                                            type="text"
                                                            name="title"
                                                            id="title"
                                                            autocomplete="title"
                                                            class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Notice title..."
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="errors.title"
                                                        v-text="errors.title"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <label
                                                    for="from"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >From</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="form.from"
                                                            type="text"
                                                            name="from"
                                                            id="from"
                                                            autocomplete="from"
                                                            class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Who is the notice from..."
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="errors.from"
                                                        v-text="errors.from"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div></div>
                                            <div class="sm:col-span-full mt-5">
                                                <div
                                                    class="flex justify-between"
                                                >
                                                    <label
                                                        for="body"
                                                        class="block text-sm font-medium leading-6 text-gray-900"
                                                        >Content</label
                                                    >
                                                </div>
                                                <div class="mt-2">
                                                    <div
                                                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <textarea
                                                            v-model="
                                                                form.body
                                                            "  
                                                            cols="15rem"
                                                            name="body"
                                                            id="body"
                                                            autocomplete="body"
                                                            class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Notice..."
                                                        ></textarea>
                                                    </div>
                                                    <div
                                                        v-if="errors.body"
                                                        v-text="errors.body"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="mt-6 flex items-center justify-end gap-x-6"
                                >
                                    <button
                                        @click="returnBack"
                                        type="button"
                                        class="text-sm font-semibold leading-6 text-gray-900"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
export default {
    props: { errors: Object },
    data() {
        return {
            form: {
                title: "",
                from: "",
                body: "",
            },
        };
    },
    components: { AppLayout, Link, SecondaryButton },
    methods: {
        returnBack() {
            router.get("/notices");
        },
        submit() {
            //Validation
            router.post("/notices", this.form);
        },
    },
};
</script>
