<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <div>
                <div class="mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">
                            Create New User
                        </h3>
                        <p class="mt-1 mb-5 text-sm text-gray-600">
                            Edit a user in the system
                        </p>
                    </div>
                    <div
                        class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"
                    >
                        <div>
                            <form @submit.prevent="submit()">
                                <div class="space-y-12">
                                    <div
                                        class="border-b border-gray-900/10 pb-12"
                                    >
                                        <div
                                            class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                        >
                                            <div class="sm:col-span-4">
                                                <label
                                                    for="username"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Username</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="form.name"
                                                            type="text"
                                                            name="username"
                                                            id="username"
                                                            autocomplete="username"
                                                            class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Username"
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="errors.name"
                                                        v-text="errors.name"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <label
                                                    for="email"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Email</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="form.email"
                                                            type="email"
                                                            name="email"
                                                            id="email"
                                                            autocomplete="email"
                                                            class="block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Email"
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="errors.email"
                                                        v-text="errors.email"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <label
                                                    for="role"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Role</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <select
                                                            v-model="form.role"
                                                            name="role"
                                                            id="role"
                                                            autocomplete="role"
                                                            class="capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                                hidden
                                                                selected
                                                            >
                                                                Select role...
                                                            </option>

                                                            <option
                                                                class="capitalize"
                                                                v-for="role of roles"
                                                                :key="role.id"
                                                                :value="role.id"
                                                                :selected="
                                                                    user.role
                                                                "
                                                            >
                                                                {{ role.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="errors.role"
                                                        v-text="errors.role"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div
                                                v-if="form.role == 4 || form.role == 5"
                                                class="sm:col-span-full mt-5"
                                            >
                                                <label
                                                    for="department"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Department:</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <select
                                                            v-model="form.department"
                                                            name="department"
                                                            id="department"
                                                            autocomplete="department"
                                                            class="capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                                hidden
                                                                selected
                                                            >
                                                                Select department...
                                                            </option>

                                                            <option
                                                                class="capitalize"
                                                                v-for="department of departments"
                                                                :key="department.id"
                                                                :value="department.id"
                                                                :selected="
                                                                    user.department
                                                                "
                                                            >
                                                                {{ department.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="errors.department"
                                                        v-text="
                                                            errors.department
                                                        "
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div
                                                v-if="form.role == 7"
                                                class="sm:col-span-full mt-5"
                                            >
                                                <label
                                                    for="programme"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Programme</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <select
                                                            v-model="
                                                                form.programme
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
                                                                Select
                                                                programme...
                                                            </option>

                                                            <option
                                                                class="capitalize"
                                                                v-for="programme of programmes"
                                                                :key="
                                                                    programme.id
                                                                "
                                                                :value="
                                                                    programme.id
                                                                "
                                                            >
                                                                {{
                                                                    programme.name
                                                                }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="errors.programme"
                                                        v-text="
                                                            errors.programme
                                                        "
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div
                                                v-if="form.role == 7"
                                                class="sm:col-span-full mt-5"
                                            >
                                                <label
                                                    for="level"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Level</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <select
                                                            v-model="form.level"
                                                            name="level"
                                                            id="level"
                                                            autocomplete="level"
                                                            class="capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        >
                                                            <option
                                                                value=""
                                                                disabled
                                                                hidden
                                                                selected
                                                            >
                                                                Select level...
                                                            </option>

                                                            <option
                                                                class="capitalize"
                                                                v-for="level of levels"
                                                                :key="level.id"
                                                                :value="
                                                                    level.id
                                                                "
                                                            >
                                                                {{ level.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="errors.level"
                                                        v-text="errors.level"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <label
                                                    for="password"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Password</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="
                                                                form.password
                                                            "
                                                            type="password"
                                                            name="password"
                                                            id="password"
                                                            autocomplete="password"
                                                            class="block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Password"
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="errors.password"
                                                        v-text="errors.password"
                                                        class="mt-1 font-bold text-sm text-red-500"
                                                    ></div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-full mt-5">
                                                <label
                                                    for="password_confirm"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Confirm Password</label
                                                >
                                                <div class="mt-2">
                                                    <div
                                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                                    >
                                                        <input
                                                            v-model="
                                                                form.password_confirmation
                                                            "
                                                            type="password"
                                                            name="password_confirm"
                                                            id="password_confirm"
                                                            autocomplete="password_confirm"
                                                            class="block flex-1 border-0 bg-transparent p-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="Confirm password"
                                                        />
                                                    </div>
                                                    <div
                                                        v-if="
                                                            errors.password_confirmation
                                                        "
                                                        v-text="
                                                            errors.password_confirmation
                                                        "
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
                                    <Link
                                        :href="route('users.index')"
                                        class="text-sm font-semibold leading-6 text-gray-900"
                                    >
                                        Cancel
                                    </Link>
                                    <button
                                        type="submit"
                                        class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                    >
                                        Edit
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
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
export default {
    data() {
        return {
            form: useForm({
                name: this.user.name,
                email: this.user.email,
                password: "",
                password_confirmation: "",
                role: this.user.role,
                level: this.user.level,
                programme: this.user.programme,
                department: this.user.department,
            }),
        };
    },
    components: { AppLayout, Link },
    props: {
        errors: Object,
        roles: Object,
        user: Object,
        departments: Object,
        programmes: Object,
        levels: Object,
    },
    methods: {
        submit() {
            //Validation
            // this.errors = "";
            // router.put("/users", this.form);
            // console.log(this.user.id);
            this.form.put("/users/" + this.user.id);
        },
    },
};
</script>
