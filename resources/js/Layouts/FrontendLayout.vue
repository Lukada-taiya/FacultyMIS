<template>
    <body>
        <Nav />
        <slot></slot>
        <Footer />
    </body>
</template>
<script>
import Nav from "@/Pages/Shared/Nav.vue";
import Footer from "@/Pages/Shared/Footer.vue";

export default {
    components: { Nav, Footer },
};
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

p {
    color: #fff;
}
</style>
