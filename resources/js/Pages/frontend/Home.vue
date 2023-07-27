<template> 
        <FrontendLayout>
        <main>
            <div class="left">
                <div class="heading">
                    <GradientText htype="h1"
                        >Management Information System - SCIS</GradientText
                    >
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        nisl tincidunt eget. Lectus mauris eros in vitae .
                    </p>
                </div>
                <div class="call-action">
                    <base-button mode="radiant">LOGIN TO SYSTEM</base-button>
                    <div class="pointer">
                        <img src="../assets/pointer.png" alt="pointer" />
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="image">
                    <img src="../assets/home_pic.jpg" alt="" />
                </div>
            </div>
        </main> 
        </FrontendLayout>
</template>
<script> 
import GradientText from "../Shared/ui/GradientText.vue";
import BaseButton from "../Shared/ui/BaseButton.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
export default {
    components: { BaseButton, GradientText, FrontendLayout },
};
</script>
<style scoped>

main {
    margin-top: 3rem;
    position: relative;
    height: 32rem;
}

.left {
    display: inline-block;
    width: 40%;
    margin-left: 1.5rem;
}

.left .heading {
    width: 80%;
    margin-top: 3rem;
    margin-bottom: 2rem;
}

.left .call-action {
    font-size: small;
}

.left .call-action .pointer {
    display: inline-block;
    vertical-align: middle;
}

.left .call-action .pointer img {
    width: 4rem;
}

.right {
    display: inline-block;
    position: absolute;
    right: 0.5rem;
    width: 55%;
}

.right .image img {
    width: 85%;
    border-radius: 100px 100px 100px 240px;
    box-shadow: 20px 20px #610808;
}
</style>
