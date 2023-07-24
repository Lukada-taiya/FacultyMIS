<template>
    <header>
        <div class="brand">
            <div class="logo">
                <img src="../assets/logo.png" alt="ckt_logo" />
            </div>
            <div class="brand-text">
                SCHOOL OF COMPUTING AND INFORMATION SCIENCES - CK TEDAM
            </div>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <Link href="/" :class="{'active': $page.component ==='frontend/Home'}">HOME</Link>
                </li>
                <li><Link href="/about" :class="{'active': $page.component ==='frontend/About'}">ABOUT</Link></li>
                <li><Link href="/notice-board" :class="{'active': $page.component ==='frontend/NoticeBoard'}">NOTICE BOARD</Link></li>
            </ul>
        </div>
        <div class="action-buttons">
            <base-button mode="outlined" link to="/contact">CONTACT US</base-button>
            <base-button mode="radiant" link to="/login">LOGIN</base-button>
        </div>
    </header>
</template>
<script>
import BaseButton from "./ui/BaseButton.vue";
import { Link } from "@inertiajs/vue3";
export default {
    components: {BaseButton, Link }
}
</script>
<style>
body {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Raleway", "Arial", sans-serif;
    line-height: 1.5;
    color: #fff;
    background-color: #950c0c;
}

header {
    font-size: small;
    margin: 1.2rem 1.2rem 0 1.2rem;
}

.brand {
    display: inline-block;
}

.brand .logo {
    display: inline-block;
}

.brand .logo img {
    width: 3.2rem;
}

.brand .brand-text {
    display: inline-block;
    vertical-align: top;
    margin-left: 1rem;
    width: 15rem;
}

.nav {
    display: inline-block;
    vertical-align: top;
    width: 47rem;
}

.nav ul {
    list-style-type: none;
    text-align: center;
}

.nav ul li {
    display: inline-block;
    margin-left: 1rem;
}

.nav ul a {
    color: inherit; 
    text-decoration: none;
}

.nav ul a:hover {
    color: #ccc;
}

.active {
    font-weight: bold;
}

.nav ul .active:hover {
    color: #fff;
}

.action-buttons {
    display: inline-block;
    vertical-align: top;
}

</style>