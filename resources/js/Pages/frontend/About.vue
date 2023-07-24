<template>
    <Nav />
    <main>
        <div class="left">
            <div class="title">
                <gradient-text htype="h1">About Us</gradient-text>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore nisl tincidunt
                eget. Lectus mauris eros in vitae . Lorem ipsum dolor sit amet,
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore nisl tincidunt eget. Lectus mauris eros in
                vitae .
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore nisl tincidunt
                eget. Lectus mauris eros in vitae .
            </p>
        </div>
        <div class="right">
            <img src="../assets/about_pic.jpg" alt="about_pic" />
        </div>
    </main>
    <Footer />
</template>
<script>
import Nav from "../Shared/Nav.vue";
import GradientText from "../Shared/ui/GradientText.vue";
import Footer from "../Shared/Footer.vue";
export default {
    components: { Nav, GradientText, Footer },
};
</script>
<style scoped>
main {
    margin-top: 2rem;
    height: 500px;
    display: flex;
}
.left {
    width: calc(50% - 50px);
    height: 100%;
    box-sizing: border-box;
    padding-left: 1.5rem;
}

.left .title {
    text-align: center;
    margin-top: 2rem;
}

.right {
    position: relative;
    width: calc(50% + 50px);
    background-color: transparent;
    box-sizing: border-box;
    border-left: 100px solid #950c0c;
    border-bottom: 500px solid transparent;
}

.right img {
    position: absolute;
    top: 0;
    left: -100px;
    height: 500px;
    z-index: -1;
    width: 725px;
}
</style>
