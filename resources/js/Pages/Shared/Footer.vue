<template>
    <footer>
        <div class="content">
            <div class="logo">
                <img src="../assets/logo.png" alt="ckt_logo" />
            </div>
            <ul>
                <li>
                    <Link href="/">Home</Link>
                </li>
                <li>
                    <Link href="/about">About</Link>
                </li>
                <li>
                    <Link href="/notice-board">Notice Board</Link>
                </li>
                <li>
                    <Link href="contact">Contact Us</Link>
                </li>
            </ul>
            <div class="id">All Rights Reserved &copy; 2023</div>
        </div>
    </footer>
</template>
<script>
    import { Link } from '@inertiajs/vue3';

    export default {
        components: { Link }
    }
</script>
<style scoped>
footer {
    height: 13rem;
    background-color: #000;
    text-align: center;
}

footer .content {
    width: 70%;
    display: inline-block;
    margin-top: 2rem;
}

.content .logo {
    display: inline-block;
}

.content .logo img {
    width: 5rem;
}

.content ul {
    list-style-type: none;
}

.content ul li {
    display: inline-block;
    margin-right: 1rem;
}

.content ul a {
    text-decoration: none;
    color: inherit;
}
</style>