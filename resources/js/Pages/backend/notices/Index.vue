<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            All Notices
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Manage all the information of notices here
                        </p>
                    </div>
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    > <div class="my-6">
                    <Link :href="route('notices.create')" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Create New Notice</Link>
                      </div>
                        <div
                            v-if="
                                notices.data.length !== 0 && can('manage notices')
                            "
                            class="relative overflow-x-auto"
                        >
                            <table
                                class="w-full text-sm text-left text-gray-500"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            From
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Content
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date Created
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="notice in notices.data"
                                        :key="notice.id"
                                        class="bg-white border-b"
                                    >
                                        <td
                                            scope="row"
                                            class="px-6 py-4 font-medium whitespace-nowrap"
                                        >
                                            {{ notice.id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ notice.title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ notice.from }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ notice.body }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ notice.date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <!-- <Link
                                                v-if="can('update notices')"
                                                class="text-yellow-700 font-bold"
                                                :href="
                                                    route(
                                                        'notices.edit',
                                                        notice.id
                                                    )
                                                "
                                                >Edit</Link
                                            > -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="text-center">
                            No notices have been created yet.
                        </div>
                        <div>
                            <div class="mt-6 display:inline-block">
                                <Component
                                    v-if="notices.data.length !== 0"
                                    v-for="link in notices.links"
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
    props: { notices: Object },
};
</script>
