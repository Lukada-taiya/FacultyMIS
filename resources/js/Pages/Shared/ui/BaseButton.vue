<template>
    <button v-if="!link" :class="mode">
        <slot></slot>
    </button>
    <Link v-else :href="to" :class="mode">
        <slot></slot>
    </Link>
</template>
<script>
import { Link } from "@inertiajs/vue3";
export default {
    components: { Link },
    props: {
        mode: {
            type: String,
            required: false,
            default: null,
        },
        link: {
            type: Boolean,
            required: false,
            default: false,
        },
        to: {
            type: String,
            required: false,
            default: "/",
        },
    },
};
</script>
<style scoped>
button,
a {
    text-decoration: none;
    padding: 0.75rem 1.5rem;
    font: inherit;
    background-color: #ff9c09;
    border: none;
    color: #fff;
    cursor: pointer;
    border-radius: 30px;
    margin-right: 0.5rem;
    display: inline-block;
}

a:hover,
a:active,
button:hover,
button:active {
    background-color: #e78f09;
}

.radiant {
    background: linear-gradient(to right, #ff9900, #febe5d, #fff);
    color: #000;
    border: none;
}

.outlined {
    background-color: transparent;
    border: 1px solid #fff;
    color: #fff;
}

.radiant:hover,
.radiant:active {
    background: linear-gradient(to left, #ff9900, #febe5d, #fff);
}

.outlined:hover,
.outlined:active {
    background-color: #ff9c09;
    border: 1px solid #ff9c09;
}
</style>
