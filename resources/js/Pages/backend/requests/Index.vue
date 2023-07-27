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
                        <button
                            class="all btn btn-indigo w-full text-left"
                            @click="switchView('all')"
                        >
                            <i class="text-xs far fa-envelope mr-1"></i>
                            all requests
                        </button>
                    </li>

                    <li>
                        <button
                            class="received btn w-full text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            @click="switchView('received')"
                        >
                            <i class="text-xs fad fa-inbox mr-1"></i>
                            Received
                        </button>
                    </li>
                    <li>
                        <button
                            class="btn sent w-full text-left text-gray-800 bg-white hover:bg-gray-100 hover:text-gray-900"
                            @click="switchView('sent')"
                        >
                            <i class="text-xs fad fa-paper-plane mr-1"></i>
                            sent
                        </button>
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
            <div class="col-span-6 card flex flex-col justify-between">
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
                <component
                    :is="view"
                    :customThreads="customThreads"
                ></component>
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
import All from "./All.vue";
import Sent from "./Sent.vue";
import Received from "./Received.vue";
import { usePage } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
export default {
    components: { AppLayout, All, Received, Sent, Link },
    props: {
        threads: Object,
    },
    data() {
        return {
            user: usePage().props.auth.user,
            view: "all",
            customThreads: this.threads,
        };
    },
    methods: {
        switchView(viewText) {
            this.filterThreads(viewText);
            this.switchButtonStyle(viewText);
            this.view = viewText;
        },
        filterThreads(type) {
            // console.log('type', type);
            let newThreads = [];
            if (type === "sent") {
                for (const thread of this.threads) {
                    if (this.user.id == thread.sender.id) {
                        newThreads.push(thread);
                    }
                }
            } else if (type === "received") {
                for (const thread of this.threads) {
                    if (this.user.id != thread.sender.id) {
                        newThreads.push(thread);
                    }
                }
            } else if (type === "all") {
                newThreads = this.threads;
            }
            // console.log(newThreads);
            this.customThreads = newThreads;
        },
        switchButtonStyle(button) {
            const inactive = [
                "text-gray-800",
                "bg-white",
                "hover:bg-gray-100",
                "hover:text-gray-900",
                "btn",
            ];
            const active = "btn-indigo";
            if (button === "sent") {
                document.querySelector(".sent").classList.remove(...inactive);
                document.querySelector(".sent").classList.add(active);
                document.querySelector(".all").classList.remove(active);
                document.querySelector(".all").classList.add(...inactive);
                document.querySelector(".received").classList.remove(active);
                document.querySelector(".received").classList.add(...inactive);
            } else if (button === "received") {
                document
                    .querySelector(".received")
                    .classList.remove(...inactive);
                document.querySelector(".received").classList.add(active);
                document.querySelector(".all").classList.remove(active);
                document.querySelector(".all").classList.add(...inactive);
                document.querySelector(".sent").classList.remove(active);
                document.querySelector(".sent").classList.add(...inactive);
            } else if (button === "all") {
                document.querySelector(".all").classList.remove(...inactive);
                document.querySelector(".all").classList.add(active);
                document.querySelector(".received").classList.remove(active);
                document.querySelector(".received").classList.add(...inactive);
                document.querySelector(".sent").classList.remove(active);
                document.querySelector(".sent").classList.add(...inactive);
            }
        },
    },
};
</script>
