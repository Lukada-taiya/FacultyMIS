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
                    <form action="/contact" method="post">
                        <div class="form-item">
                            <label for="email">Your email</label>
                            <input type="email" id="email" name="email" />
                        </div>
                        <div class="form-item">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="5" />
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

export default {
    components: { GradientText, BaseButton, FrontendLayout },
};
</script>
<style scoped>
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
