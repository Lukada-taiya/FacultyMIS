<template>
    <!-- start navbar -->
    <div
        class="bg-gray-500 md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap justify-between items-center bg-white p-6 border-b border-gray-300"
    >
        <!-- logo -->
        <div class="flex-none w-56 flex flex-row items-center">
            <img src="/logo.png" class="w-10 flex-none" />
            <strong class="capitalize ml-1 flex-1">FacultyMIS</strong>

            <button
                id="sliderBtn"
                class="flex-none text-right text-gray-900 hidden md:block"
            >
                <i class="fad fa-list-ul"></i>
            </button>
        </div>
        <!-- end logo -->

        <!-- navbar content toggle -->
        <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
            <i class="fad fa-chevron-double-down"></i>
        </button>
        <!-- end navbar content toggle -->

        <!-- navbar content -->
        <div
            id="navbar"
            class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white pl-3 flex flex-row flex-wrap items-center md:flex-col md:items-center"
        >
            <!-- right -->
            <div class="flex flex-row-reverse items-center">
                <!-- user -->
                <div id="user-dropdown" class="dropdown relative md:static">
                    <button
                        @click="toggleMenu('user-dropdown')"
                        class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center"
                    >
                        <div class="w-8 h-8 overflow-hidden rounded-full">
                            <img
                                class="w-full h-full object-cover"
                                :src="profilePic"
                            />
                        </div>

                        <div class="ml-2 capitalize flex">
                            <h1
                                class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none"
                            >
                                {{ $page.props.auth.user.name }}
                            </h1>
                            <i
                                class="fad fa-chevron-down ml-2 text-xs leading-none"
                            ></i>
                        </div>
                    </button>

                    <button
                        @click="toggleMenuOverflow()"
                        class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"
                    ></button>

                    <div
                        class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster"
                    >
                        <!-- item -->
                        <a
                            class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            :href="route('profile.show')"
                        >
                            <i class="fad fa-user-edit text-xs mr-1"></i>
                            My profile
                        </a>
                        <!-- end item -->

                        <!-- item -->
                        <a
                            class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            :href="route('requests.index')"
                        >
                            <i class="fad fa-inbox-in text-xs mr-1"></i>
                            my requests
                        </a>

                        <!-- item -->
                        <a v-if="is('student')"
                            class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            :href="route('courses.index')"
                        >
                            <i class="fad fa-comment-alt-dots text-xs mr-1"></i>
                            my courses
                        </a>
                        <!-- end item -->
                        <!-- item -->
                        <a
                            v-if="is('lecturer')"
                            class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            :href="route('courses.index')"
                        >
                            <i class="fad fa-comment-alt-dots text-xs mr-1"></i>
                            my students
                        </a>
                        <!-- end item -->

                        <hr />

                        <!-- item -->
                        <form @submit.prevent="logout">
                            <button
                                type="submit"
                                class="block w-full px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out"
                            >
                                <i class="fad fa-user-times text-xs mr-1"></i>
                                Log Out
                            </button>
                        </form>
                        <!-- end item -->
                    </div>
                </div>
                <!-- end user -->


                <!-- messages -->

            </div>
            <!-- end right -->
        </div>
        <!-- end navbar content -->
    </div>
    <!-- end navbar -->
</template>
<script>
import { Link, router } from "@inertiajs/vue3";
export default {
    components: { Link },
    props: {
        auth: Object,
    },
    computed: {
        profilePic() {
            return "/img/user.svg";
        },
    },
    methods: {
        toggleMenu(id) {
            const menu = document.querySelector("#" + id + " .menu");
            const menuOverflow = document.querySelector(
                "#" + id + " .menu-overflow"
            );
            menu.classList.toggle("hidden");
            menu.classList.toggle("fadeIn");
            menuOverflow.classList.toggle("hidden");
        },
        toggleMenuOverflow() {
            const overflows = document.getElementsByClassName("menu-overflow");

            for (const overflow of overflows) {
                if (!overflow.classList.contains("hidden")) {
                    overflow.nextSibling.classList.remove("fadeIn");
                    overflow.nextSibling.classList.add("hidden");
                    overflow.classList.add("hidden");
                }
            }
        },
        logout() {
            router.post(route("logout"));
        },
    },
};
</script>
