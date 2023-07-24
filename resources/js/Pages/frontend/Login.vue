<template>
    <Nav />
    <main>
        <div class="section">
            <div class="form-container">
                <div class="form-title">
                    <span v-if="login">Log In</span>
                    <span v-else>Sign Up</span>
                </div>
                <div v-if="login" class="form-desc">
                    Don't have an account?
                    <span @click="toggleLogin('signup')">Sign Up</span>
                </div>
                <div v-else class="form-desc">
                    Already have an account?
                    <span @click="toggleLogin('login')">Login</span>
                </div>
                <div class="google">
                    <button>
                        <img src="../assets/google.png" alt="google_logo" />
                        <span v-if="login">Log in</span
                        ><span v-else>Sign Up</span> with Google
                    </button>
                </div>
                <div class="divider">
                    <img src="../assets/divider.png" alt="divider" />
                </div>
                <form @submit.prevent="submit">
                    <div
                            v-if="$page.props.err"
                            v-text="$page.props.err"
                            class="errors"
                        ></div>
                    <div class="form-item">
                        <label for="email">Your email</label>
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            name="email"
                            required
                        />
                        <div
                            v-if="$page.props.errors.email"
                            v-text="$page.props.errors.email"
                            class="errors"
                        ></div>
                    </div>
                    <div class="form-item password">
                        <label for="password">Password</label>
                        <div
                            v-if="show"
                            @click="toggleShow('hide')"
                            class="visible"
                        >
                            <img src="../assets/hide.svg" alt="hide" /> Hide
                        </div>
                        <div v-else @click="toggleShow('show')" class="visible">
                            <img src="../assets/show.png" alt="show" /> Show
                        </div>
                        <input
                            v-model="form.password"
                            ref="password"
                            name="password"
                            id="password"
                            type="password"
                            required
                        />
                        <div
                            v-if="$page.props.errors.password"
                            v-text="$page.props.errors.password"
                            class="errors"
                        ></div>
                        <span v-if="login">Forgot your password</span>
                    </div>

                    <div v-if="!login" class="form-item">
                        <label for="password_confirm">Retype password</label>
                        <input
                            ref="password_confirm"
                            name="password_confirm"
                            id="password_confirm"
                            type="password"
                            required
                        />
                    </div>
                    <div class="form-item">
                        <base-button type="submit" name="submit"
                            ><span v-if="login">Login</span
                            ><span v-else>Sign Up</span></base-button
                        >
                    </div>
                </form>
            </div>
        </div>
    </main>
    <Footer />
</template>
<script>
import Nav from "../Shared/Nav.vue";
import Footer from "../Shared/Footer.vue";
import BaseButton from "../Shared/ui/BaseButton.vue";
import { router } from "@inertiajs/vue3";

export default {
    components: { Nav, Footer, BaseButton },
    data() {
        return {
            login: true,
            show: false,
            form: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        toggleLogin(type) {
            this.login = type === "login" ? true : false;
        },
        toggleShow(isShow) {
            if (isShow === "show") {
                this.$refs.password.type = "text";
                if (this.$refs.password_confirm !== null) {
                    this.$refs.password_confirm.type = "text";
                }
                this.show = true;
            } else {
                this.$refs.password.type = "password";
                if (this.$refs.password_confirm !== null) {
                    this.$refs.password_confirm.type = "password";
                }
                this.show = false;
            }
        },
        submit() {
            router.post("/authenticate", this.form);
        },
    },
};
</script>
<style scoped>
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
    font-size: 2rem;
    font-weight: bold;
}

.form-desc {
    margin: 1rem 0;
}

.password span,
.form-desc span {
    text-decoration: underline;
}

.password span,
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

.form-item label {
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

.password span {
    position: absolute;
    right: -1rem;
}
</style>
