<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            All Semesters
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Manage all the information of system semesters here
                        </p>
                    </div>
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    >
                        <div class="mb-12">
                            <div class="my-3">
                                <h5 class="font-bold text-sm">
                                    Create new semester:
                                </h5>
                            </div>
                            <form @submit.prevent="submit">
                                <div class="flex justify-around items-baseline">
                                    <div class="flex flex-col w-2/3">
                                        <div class="flex items-baseline">
                                            <InputLabel
                                                class="mr-4"
                                                for="name"
                                                value="name:"
                                            />
                                            <TextInput
                                                id="name"
                                                v-model="form.name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                required
                                                autocomplete="name"
                                            />
                                        </div>
                                        <InputError
                                            :message="form.errors.name"
                                            class="mt-2"
                                        />
                                    </div>
                                    <div>
                                        <PrimaryButton
                                            :class="{
                                                'opacity-25': form.processing,
                                            }"
                                            :disabled="form.processing"
                                        >
                                            create
                                        </PrimaryButton>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div
                            v-if="semesters.data.length !== 0"
                            class="relative overflow-x-auto"
                        >
                            <table
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="semester in semesters.data"
                                        :key="semester.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <td
                                            scope="row"
                                            class="px-6 py-4 font-medium whitespace-nowrap dark:text-white"
                                        >
                                            {{ semester.id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ semester.name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link
                                                class="text-yellow-700 font-bold"
                                                :href="
                                                    route(
                                                        'semesters.edit',
                                                        semester.id
                                                    )
                                                "
                                                >Edit</Link
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center">
                            No semesters have been created yet.
                        </div>
                        <div>
                            <div class="mt-6 display:inline-block">
                                <Component
                                    v-if="semesters.data.length !== 0"
                                    v-for="link in semesters.links"
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
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
export default {
    components: {
        AppLayout,
        Link,
        InputError,
        InputLabel,
        TextInput,
        PrimaryButton,
    },
    props: { semesters: Object },
    data() {
        return {
            form: useForm({
                name: "",
            }),
        };
    },
    methods: {
        submit() {
            //validation
            this.form.post("/semesters");
        },
    },
};
</script>
