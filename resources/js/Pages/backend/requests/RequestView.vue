<template>
    <div class="p-8">
        <div class="text-center mb-6">
            <img src="logo.png" class="w-16" alt="logo" />
        </div>
        <div v-html="html"></div>
    </div>
</template>
<script>
export default {
    props: { html: String },
};
</script>
