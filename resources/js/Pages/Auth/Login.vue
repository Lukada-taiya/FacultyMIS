<template>    
<FrontendLayout>
    <main>
        <div class="section">
            <div class="form-container">
                <div class="form-title text-gray-700 mb-3">
                    <span>Sign in to your account</span>
                </div>
                <div
                    v-if="status"
                    class="mb-4 font-medium text-sm text-green-600"
                >
                    {{ status }}
                </div>
                <form @submit.prevent="submit">
                    <div
                        v-if="$page.props.err"
                        v-text="$page.props.err"
                        class="errors"
                    ></div>
                    <div class="form-item">
                        <label id="label" for="email">Your email</label>
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            name="email"
                            required
                        />
                        <div
                            v-if="form.errors.email"
                            v-text="form.errors.email"
                            class="errors"
                        ></div>
                    </div>
                    <div class="form-item password">
                        <label id="label" for="password">Password</label>
                        <!-- <div
                            v-if="show"
                            @click="toggleShow('hide')"
                            class="visible hidden"
                        >
                            <img src="../assets/hide.svg" alt="hide" /> Hide
                        </div>
                        <div
                            v-else
                            @click="toggleShow('show')"
                            class="visible hidden"
                        >
                            <img src="../assets/show.png" alt="show" /> Show
                        </div> -->
                        <input
                            v-model="form.password"
                            ref="password"
                            name="password"
                            id="password"
                            type="password"
                            required
                        />
                        <div
                            v-if="form.errors.password"
                            v-text="form.errors.password"
                            class="errors"
                        ></div>
                        <div class="flex justify">
                            <div class="block mt-4">
                                <label class="flex items-center">
                                    <Checkbox
                                        v-model:checked="form.remember"
                                        name="remember"
                                    />
                                    <span class="ml-2 text-sm text-gray-600"
                                        >Remember me</span
                                    >
                                </label>
                            </div>
                            <div class="mt-4">
                                <!-- <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            >Forgot your password</Link
                        > -->
                                <Link
                                    class="text-sm text-gray-600"
                                    :href="route('password.request')"
                                    >Forgot your password</Link
                                >
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <base-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            type="submit"
                            name="submit"
                            ><span>Login</span></base-button
                        >
                    </div>
                </form>
            </div>
        </div>
    </main> 
    </FrontendLayout>
</template>
<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import BaseButton from "../Shared/ui/BaseButton.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import Nav from "../Shared/Nav.vue";
import Footer from "../Shared/Footer.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};

// const toggleShow = (isShow) => {
//     if (isShow === "show") {
//         this.$refs.password.type = "text";
//         if (this.$refs.password_confirm !== null) {
//             this.$refs.password_confirm.type = "text";
//         }
//         this.show = true;
//     } else {
//         this.$refs.password.type = "password";
//         if (this.$refs.password_confirm !== null) {
//             this.$refs.password_confirm.type = "password";
//         }
//         this.show = false;
//     }
// };
</script>

<style scoped>
.justify {
    justify-content: space-between;
}
.section {
    text-align: center;
    margin: 2rem 0;
}

.form-container {
    margin-top: 1rem;
    display: inline-block;
    width: 30rem;
    padding: 3rem 5rem;
    border-radius: 1.5rem;
    background-color: #fff;
    color: #000;
    font-size: small;
}

.form-title {
    font-size: 1rem;
    /* font-weight: bold; */
}

.form-desc {
    margin: 1rem 0;
}

.password #span,
.form-desc span {
    text-decoration: underline;
}

.password #span,
.form-desc span:hover,
.form-item .visible {
    cursor: pointer;
}

.google button {
    width: 22rem;
    color: #000;
    padding: 0.75rem 1.5rem;
    font: inherit;
    background-color: transparent;
    border: 1px solid #000;
    cursor: pointer;
    border-radius: 30px;
    display: inline-block;
}

.google button img {
    width: 20px;
    margin-right: 5px;
    vertical-align: middle;
}

.divider {
    margin-top: 1rem;
}

.divider img {
    width: 25rem;
}

.form-item {
    margin-bottom: 1rem;
    text-align: left;
}

.form-item #label {
    display: block;
    color: #444;
}

.form-item #email,
.form-item #password,
.form-item textarea {
    display: block;
    padding: 0.5rem;
    width: 100%;
    border: 1px solid #ccc;
    font: inherit;
    border-radius: 5px;
}
.form-item #email:focus,
.form-item #password:focus,
.form-item textarea:focus {
    background-color: #f0e6fd;
    outline: none;
    border-color: #ff9c09;
}

.errors {
    color: red;
}

.form-item button {
    width: 100%;
    margin-top: 1rem;
}

.form-item .visible {
    position: absolute;
    right: -1.2rem;
    top: -0.2rem;
    width: 60px;
}

.form-item .visible img {
    width: 20px;
    vertical-align: middle;
}

.password {
    position: relative;
}

.password #span {
    position: absolute;
    right: -1rem;
}
</style>
