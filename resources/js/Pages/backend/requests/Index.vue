<template>
    <AppLayout>
        <div class="bg-gray-100 flex-1 p-6 md:mt-16 grid grid-cols-8">
            <div class="col-span-2 bg-white border rounded p-6 mr-8">
                <Link
                    :href="route('requests.create')"
                    class="btn-bs-dark uppercase tracking-wider"
                >
                    <i class="fad fa-layer-plus mr-2"></i>
                    Compose
                </Link>
                <hr class="my-6" />

                <ul>
                    <li class="my-5 mt-0">
                        <a class="btn-indigo text-left" href="#">
                            <i class="text-xs far fa-envelope mr-1"></i>
                            all
                        </a>
                    </li>

                    <li>
                        <a
                            class="btn text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            href="#"
                        >
                            <i class="text-xs fad fa-inbox mr-1"></i>
                            Received
                        </a>
                    </li>
                    <li>
                        <a
                            class="btn text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            href="#"
                        >
                            <i class="text-xs fad fa-paper-plane mr-1"></i>
                            sent
                        </a>
                    </li>

                    <li>
                        <a
                            class="btn text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            href="#"
                        >
                            <i class="text-xs fad fa-star mr-1"></i>
                            Marked
                        </a>
                    </li>

                    <li>
                        <a
                            class="btn text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            href="#"
                        >
                            <i class="text-xs fad fa-inbox-in mr-1"></i>
                            draft
                        </a>
                    </li>
                    <li>
                        <a
                            class="btn text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            href="#"
                        >
                            <i class="text-xs fad fa-trash mr-1"></i>
                            trash
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-span-6 card flex flex-col">
                <div class="px-3 border-b">
                    <form action="" class="flex">
                        <input
                            class="p-3 flex-1"
                            type="text"
                            placeholder="search"
                        />
                        <button type="submit" class="p-3">
                            <i class="fad fa-search"></i>
                        </button>
                    </form>
                </div>

                <div class="flex-1 flex flex-col">
                    <!-- message -->

                    <div                    
                        @click="openRequest(thread.id)"
                        v-for="thread in threads"
                        :key="thread.id"
                        class="cursor-pointer flex items-center shadow-xs transition-all duration-300 ease-in-out p-5 hover:shadow-md"
                    >
                        <div class="w-10 h-10 overflow-hidden rounded-md">
                            <img
                                class="img-responsive"
                                src="img/user.svg"
                                :alt="thread.sender.name"
                            />
                        </div>
                        <h1 class="ml-3 text-sm text-gray-500">
                            {{ thread.sender.name }}
                        </h1>
                        <p class="ml-6 flex-1 text-sm text-gray-500">
                            {{ thread.subject }}
                        </p>
                        <p class="text-sm text-gray-500">
                            {{ thread.created_at }}
                        </p>
                    </div>
                    <!-- message -->
                </div>

                <div class="card-footer flex justify-between">
                    <p>4.41 GB (25%) of 17 GB used Manage</p>
                    <p>Last account activity: 36 minutes ago</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
export default {
    components: { AppLayout, Link },
    props: {
        threads: Object,
    },
    methods: {
        openRequest(id) {
            router.get('/requests/'+id);
        }
    }
};
</script>
