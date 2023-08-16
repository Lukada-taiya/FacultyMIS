<template>
    <!-- start sidebar -->
    <div
        id="sideBar"
        class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster"
    >
        <!-- sidebar content -->
        <div class="flex flex-col">
            <!-- sidebar toggle -->
            <div class="text-right hidden md:block mb-4">
                <button id="sideBarHideBtn">
                    <i class="fad fa-times-circle"></i>
                </button>
            </div>
            <!-- end sidebar toggle -->

            <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">
                recents
            </p>

            <SidebarLink icon="fad fa-window-alt" :href="route('requests.index')"
                >Requests</SidebarLink
            >

            <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">
                Manage
            </p>
            <SidebarLink icon="fad fa-users" :href="route('users.index')">Users</SidebarLink>
            <SidebarLink icon="fad fa-window-alt" :href="route('requests.index')"
                >Requests</SidebarLink
            >
            <SidebarLink icon="fad fa-window-alt" :href="route('levels.index')">Levels</SidebarLink>
            <SidebarLink icon="fad fa-window-alt" :href="route('semesters.index')">Semesters</SidebarLink>
            <SidebarLink icon="fad fa-window-alt" :href="route('departments.index')">Departments</SidebarLink>
            <SidebarLink icon="fad fa-window-alt" :href="route('programmes.index')">Programmes</SidebarLink>
            <SidebarLink icon="fad fa-window-alt" :href="route('courses.index')">Courses</SidebarLink>

                    </div>
        <!-- end sidebar content -->
    </div>
    <!-- End Sidebar -->
</template>
<script>
import SidebarLink from "./SidebarLink.vue";

export default {
    components: { SidebarLink },
};
</script>
