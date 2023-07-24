<template>
    <!-- link -->
    <a
        :href="href"
        class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500"
    >
        <i :class="icon + ' text-xs mr-2'"></i>
        <slot />
    </a>
    <!-- end link -->
</template>
<script>
export default {
    props: {
        icon: {
            type: String,
            default: 'fad fa-users'
        },
        href: {
            type: String,
            default: '/'
        },
    },
};
</script>
