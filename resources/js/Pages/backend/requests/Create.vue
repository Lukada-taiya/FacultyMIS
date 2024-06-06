<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            Make New Request
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Send a request to the faculty if you have any issues
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
                                        class="border-gray-900/10 pb-12"
                                    >
                                        <div
                                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                        >
                                            <div class="sm:col-span-4">
                                                <label
                                                    for="subject"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Subject</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="
                                                                form.subject
                                                            "
                                                            type="text"
                                                            name="subject"
                                                            id="subject"
                                                            autocomplete="subject"
                                                            class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="What is the request about..."
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="errors.subject"
                                                        v-text="errors.subject"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <label
                                                    for="recipient"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >To</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <select
                                                            @change="
                                                                populateThroughUsers
                                                            "
                                                            v-model="
                                                                form.recipient
                                                            "
                                                            name="recipient"
                                                            id="recipient"
                                                            autocomplete="recipient"
                                                            class="block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                                hidden
                                                                selected
                                                            >
                                                                Select recipient
                                                                of the
                                                                request...
                                                            </option>
                                                            <option
                                                                v-for="user in users"
                                                                :key="user.id"
                                                                :value="user.id"
                                                                :selected="user"
                                                            >
                                                                {{ user.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="errors.recipient"
                                                        v-text="
                                                            errors.recipient
                                                        "
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div>
                                                <SecondaryButton
                                                    @click="addThroughInput"
                                                    >Add
                                                    Through</SecondaryButton
                                                >
                                            </div>
                                            <div
                                                v-for="index in numOfThrough"
                                                :key="index"
                                                class="sm:col-span-full mt-5"
                                            >
                                                <label
                                                    for="recipient"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Through {{ index }}</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <select
                                                            v-model="
                                                                form.through[
                                                                    index
                                                                ]
                                                            "
                                                            :name="
                                                                'through ' +
                                                                index
                                                            "
                                                            :id="
                                                                'through ' +
                                                                index
                                                            "
                                                            autocomplete="through"
                                                            class="block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                                hidden
                                                                selected
                                                            >
                                                                Select
                                                                recipients the
                                                                request will
                                                                pass through...
                                                            </option>
                                                            <option
                                                                v-for="tuser in through_users"
                                                                :key="tuser.id"
                                                                :value="
                                                                    tuser.id
                                                                "
                                                                :selected="
                                                                    tuser
                                                                "
                                                            >
                                                                {{ tuser.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="errors.through"
                                                        v-text="errors.through"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <div
                                                    class="flex justify-between"
                                                >
                                                    <label
                                                        class="block text-sm font-medium leading-6 text-gray-900"
                                                        >Request</label
                                                    >
                                                    <div>
                                                        <a
                                                            target="_blank"
                                                            :href="
                                                                route(
                                                                    'requests.view',
                                                                    {
                                                                        data: form.body,
                                                                    }
                                                                )
                                                            "
                                                            class="rounded-md bg-gray-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                                        >
                                                            Preview
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <div
                                                        class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                    <QuillEditor :value="form.body" @input="handleEditorInput" :options="editorOptions" />
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
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                        type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    >
                                        Send
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
import { Link, useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import QuillEditor from '@/Components/QuillEditor.vue';
export default {
    props: {
        users: Array,
        errors: Object,
        user: String,
        subject: String,
    },
    model: {
      prop: 'value',
      event: 'input'
  },
    data() {
        return {
        editorOptions: {
            // Add your Quill options here
        },
        form: useForm({
            subject: this.subject,
            recipient: this.user,
            through: {},
            body: "kljldkfjsa",
        }),
        through_users: this.users,
        numOfThrough: 1,
        };
    },
    components: { AppLayout, Link, SecondaryButton, QuillEditor },
    methods: {
        handleEditorInput(e) {
            this.form.body = e.target.innerHTML;
        },
        addThroughInput() {
            this.numOfThrough++;
        },
        populateThroughUsers() {
            this.through_users = this.users.filter(
                (user) => user.id !== this.form.recipient
            );
        },
        returnBack() {
            router.get("/requests");
        },
        submit() {
            //Validation
            router.post("/requests", this.form);
        },
    },
};
</script>
