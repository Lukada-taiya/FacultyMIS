<template>
    <FrontendLayout>
        <main>
            <div class="main">
                <div class="title">
                    <gradient-text htype="h1">Notice Board</gradient-text>
                </div>
                <div class="section">
                    <div
                        v-for="notice in notices"
                        :key="notice.id"
                        class="note"
                    >
                        <div class="note-title">{{ notice.title }}</div>
                        <div class="note-date">{{ notice.date }}</div>
                        <div class="note-author">
                            <strong>From:</strong> {{ notice.from }}
                        </div>
                        <div class="note-content">
                            {{ notice.body }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </FrontendLayout>
</template>
<script>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import GradientText from "../Shared/ui/GradientText.vue";

export default {
    components: { GradientText, FrontendLayout },
    props: { notices: Object },
};
</script>
<style scoped>
main {
    text-align: center;
    min-height: 70vh;
}

.main {
    display: inline-block;
    margin-top: 2rem;
}

.section {
    text-align: left;
    margin: 2rem 0;
}

.note {
    width: 35rem;
    margin-bottom: 1rem;
    padding: 2rem;
    background-color: #fff;
    color: #000;
    position: relative;
    border-radius: 1.5rem;
}

.note-title {
    font-weight: bold;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.note-date {
    font-size: small;
    position: absolute;
    right: 1rem;
    top: 1rem;
}

.note-author {
    font-size: small;
    margin-bottom: 0.7rem;
}
</style>
