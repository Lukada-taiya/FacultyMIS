<template>
    <FrontendLayout>
        <main>
            <div class="left">
                    <div class="title">
                        <gradient-text htype="h1">About Us</gradient-text>
                    </div>
                    <div class="content">
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
                </div>
            <div class="right">
                    <img src="../assets/about_pic.jpg" alt="about_pic" />
            </div>
        </main>
    </FrontendLayout>
</template>
<script>
import GradientText from "../Shared/ui/GradientText.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
export default {
    components: { GradientText, FrontendLayout },
};
</script>
<style scoped>
main {
    margin-top: 2rem;
    min-height: 70vh;
    display: flex;
}

.left {
    width: calc(50% - 50px);
    height: 100%;
}

.left .title {
    text-align: center;
    margin-top: 2rem;
    margin-bottom: 2rem;
}

.left .content {
    width: 90%;
    padding: 1rem;
}

.right {
    position: relative;
    width: calc(50% + 50px);
    box-sizing: border-box;
}

.right img {
    position: absolute;
    top: 0;
    right: 0;
    overflow: hidden;
    height: 70vh;
    border-radius: 2rem 0 0 2rem;
}
</style>
