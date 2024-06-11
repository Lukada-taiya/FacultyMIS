<template>
    <FrontendLayout>
        <main>
            <div class="section">
                <div class="title">
                    <gradient-text htype="h1">Contact Us</gradient-text>
                </div>
                <div class="form-container">
                    <div class="form-desc">
                        Contact our help desk if you have any enquiries or
                        issues with this school. You will receive a reply in
                        your email in a few hours.
                    </div>
                    <form @submit.prevent="submit()">
                        <div class="form-item">
                            <label for="email">Your email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                name="email"
                            />
                            <div
                                v-if="errors.email"
                                v-text="errors.email"
                                class="mt-1 font-bold text-sm text-red-500"
                            ></div>
                        </div>
                        <div class="form-item">
                            <label for="message">Message</label>
                            <textarea
                                v-model="form.message"
                                name="message"
                                id="message"
                                rows="5"
                            />
                            <div
                                v-if="errors.message"
                                v-text="errors.message"
                                class="mt-1 font-bold text-sm text-red-500"
                            ></div>
                        </div>
                        <div class="form-item">
                            <base-button type="submit" name="submit"
                                >Submit</base-button
                            >
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </FrontendLayout>
</template>
<script>
import GradientText from "../Shared/ui/GradientText.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import BaseButton from "../Shared/ui/BaseButton.vue";
import { router } from "@inertiajs/vue3";

export default {
    props: { errors: Object },
    data() {
        return {
            form: {
                email: "",
                message: "",
            },
        };
    },
    components: { GradientText, BaseButton, FrontendLayout },
    methods: {
        submit() {
            router.post("/contact", this.form);
        },
    },
};
</script>
<style scoped>
main {
    min-height: 70vh;
}
.section {
    text-align: center;
    margin: 2rem 0;
}

.form-container {
    text-align: left;
    margin-top: 1rem;
    display: inline-block;
    width: 30rem;
    padding: 2rem;
    border-radius: 1.5rem;
    background-color: #fff;
    color: #000;
    font-size: small;
}

.form-desc {
    margin-bottom: 1rem;
}

.form-item {
    margin-bottom: 1rem;
}

.form-item label {
    /* font-weight: bold; */
    display: block;
    color: #444;
}

.form-item input,
.form-item textarea {
    display: block;
    padding: 0.5rem;
    width: 100%;
    border: 1px solid #ccc;
    font: inherit;
    border-radius: 5px;
}

.form-item input:focus,
.form-item textarea:focus {
    background-color: #f0e6fd;
    outline: none;
    border-color: #ff9c09;
}

.form-item button {
    width: 100%;
}
</style>
