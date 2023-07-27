<template>
    <!-- link -->
    <Link
        :href="href"
        class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500"
    >
        <i :class="icon + ' text-xs mr-2'"></i>
        <slot />
    </Link>
    <!-- end link -->
</template>
<script>
import { Link } from "@inertiajs/vue3";
export default {
    components: { Link },
    props: {
        icon: {
            type: String,
            default: "fad fa-users",
        },
        href: {
            type: String,
            default: "/",
        },
    },
};
</script>
