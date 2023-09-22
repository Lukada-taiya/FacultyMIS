<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            All Courses
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Manage all the information of system courses here
                        </p>
                    </div>
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    >
                        <div v-if="can('create courses')" class="mb-12">
                            <div class="my-3">
                                <h5 class="font-bold text-sm">
                                    Create new course:
                                </h5>
                            </div>
                            <form @submit.prevent="submit">
                                <div
                                    class="flex flex-col justify-start gap-5 flex-wrap items-start"
                                >
                                    <div
                                        class="flex justify-around w-full gap-5"
                                    >
                                        <div class="flex flex-col">
                                            <div
                                                class="flex justify-between items-baseline"
                                            >
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
                                        <div class="flex flex-col">
                                            <div
                                                class="flex justify-between items-baseline"
                                            >
                                                <InputLabel
                                                    class="mr-4"
                                                    for="code"
                                                    value="code:"
                                                />
                                                <TextInput
                                                    id="code"
                                                    v-model="form.code"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    required
                                                    autocomplete="code"
                                                />
                                            </div>
                                            <InputError
                                                :message="form.errors.code"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="flex justify-around gap-5 w-full"
                                    >
                                        <div class="flex flex-col">
                                            <div
                                                class="flex justify-between items-baseline"
                                            >
                                                <InputLabel
                                                    class="mr-4"
                                                    for="lecturer"
                                                    value="lecturer:"
                                                />
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                >
                                                    <select
                                                        v-model="form.lecturer"
                                                        name="lecturer"
                                                        id="lecturer"
                                                        autocomplete="lecturer"
                                                        class="capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    >
                                                        <option
                                                            value=""
                                                            disabled
                                                            hidden
                                                            selected
                                                        >
                                                            Select lecturer...
                                                        </option>
                                                        <option
                                                            class="capitalize"
                                                            v-for="lecturer of lecturers"
                                                            :key="lecturer.id"
                                                            :value="lecturer.id"
                                                        >
                                                            {{ lecturer.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <InputError
                                                :message="form.errors.lecturer"
                                                class="mt-2"
                                            />
                                        </div>
                                        <div class="flex flex-col">
                                            <div class="flex items-baseline">
                                                <InputLabel
                                                    class="mr-4"
                                                    for="semester"
                                                    value="semester:"
                                                />
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                >
                                                    <select
                                                        v-model="form.semester"
                                                        name="semester"
                                                        id="semester"
                                                        autocomplete="semester"
                                                        class="capitalize block p-3 flex-1 w-2/3 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    >
                                                        <option
                                                            value=""
                                                            disabled
                                                            hidden
                                                            selected
                                                        >
                                                            Select semester...
                                                        </option>
                                                        <option
                                                            class="capitalize"
                                                            v-for="semester of semesters"
                                                            :key="semester.id"
                                                            :value="semester.id"
                                                        >
                                                            {{ semester.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <InputError
                                                :message="form.errors.semester"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-evenly mt-5 w-full text-center"
                                    >
                                        <SecondaryButton @click="addProgram"
                                            >Add Programme</SecondaryButton
                                        >
                                        <SecondaryButton
                                            v-if="
                                                form.addedPrograms.length !== 0
                                            "
                                            @click="removeProgram"
                                            >Remove Programme</SecondaryButton
                                        >
                                    </div>
                                    <div
                                        v-for="(
                                            program, index
                                        ) in form.addedPrograms"
                                        :key="'program' + index"
                                        class="flex justify-around gap-5"
                                    >
                                        <div class="flex flex-col">
                                            <div class="flex items-baseline">
                                                <InputLabel
                                                    class="mr-4"
                                                    for="programme"
                                                    value="programme:"
                                                />
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                >
                                                    <select
                                                        v-model="
                                                            program.programme
                                                        "
                                                        name="programme"
                                                        id="programme"
                                                        autocomplete="programme"
                                                        class="capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    >
                                                        <option
                                                            value=""
                                                            disabled
                                                            hidden
                                                            selected
                                                        >
                                                            Select programme...
                                                        </option>
                                                        <option
                                                            class="capitalize"
                                                            v-for="programme of programmes"
                                                            :key="programme.id"
                                                            :value="
                                                                programme.id
                                                            "
                                                        >
                                                            {{ programme.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <InputError
                                                :message="
                                                    program.errors.programme
                                                "
                                                class="mt-2"
                                            />
                                        </div>
                                        <div class="flex flex-col">
                                            <div class="flex items-baseline">
                                                <InputLabel
                                                    class="mr-4"
                                                    for="Type"
                                                    value="course type:"
                                                />
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                >
                                                    <select
                                                        v-model="program.type"
                                                        name="type"
                                                        id="type"
                                                        autocomplete="type"
                                                        class="capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    >
                                                        <option
                                                            value=""
                                                            disabled
                                                            hidden
                                                            selected
                                                        >
                                                            Select type...
                                                        </option>
                                                        <option
                                                            class="capitalize"
                                                            v-for="type of courseType"
                                                            :key="type"
                                                            :value="type"
                                                        >
                                                            {{ type }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <InputError
                                                :message="program.errors.type"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>

                                    <div class="flex justify-center w-full">
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
                            v-if="courses.data.length !== 0 && can('read courses')"
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
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Code
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="course in courses.data"
                                        :key="course.id"
                                        class="bg-white border-b"
                                    >
                                        <td
                                            scope="row"
                                            class="px-6 py-4 font-medium whitespace-nowrap"
                                        >
                                            {{ course.id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ course.name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ course.code }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link v-if="can('update courses')"
                                                class="text-yellow-700 font-bold"
                                                :href="
                                                    route(
                                                        'courses.edit',
                                                        course.id
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
                            No courses have been created yet.
                        </div>
                        <div>
                            <div class="mt-6 display:inline-block">
                                <Component
                                    v-if="courses.data.length !== 0"
                                    v-for="link in courses.links"
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
import SecondaryButton from "@/Components/SecondaryButton.vue";
export default {
    components: {
        AppLayout,
        Link,
        InputError,
        InputLabel,
        TextInput,
        PrimaryButton,
        SecondaryButton,
    },
    props: {
        courses: Object,
        programmes: Object,
        semesters: Object,
        lecturers: Object,
    },
    data() {
        return {
            form: useForm({
                name: "",
                code: "",
                semester: "",
                lecturer: "",
                addedPrograms: [],
            }),
            courseType: ["core", "elective"],
        };
    },
    methods: {
        submit() {
            //validation
            let hasError = false;
            for (const addedProgram of this.form.addedPrograms) {
                if (addedProgram.programme == 0) {
                    addedProgram.errors.programme = "This field is required";
                    hasError = true;
                }
                if (addedProgram.type == 0) {
                    addedProgram.errors.type = "This field is required";
                    hasError = true;
                }
            }

            if (!hasError) {
                this.form.post("/courses");
            }
        },
        addProgram() {
            this.form.addedPrograms.push({
                programme: "",
                type: "",
                errors: { type: "", programme: "" },
            });
        },
        removeProgram() {
            this.form.addedPrograms.pop();
        },
    },
};
</script>
