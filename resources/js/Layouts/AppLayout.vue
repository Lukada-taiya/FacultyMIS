<template>
    <body class="text-gray-950">
        <Navbar />
        <div class="h-screen flex flex-row flex-wrap">
            <Sidebar />
            <slot />
        </div> 
    </body>
</template>
<!-- <script src="../Pages/assets/js/scripts.js"></script> -->
<script>
import Navbar from "../Components/Navbar.vue";
import Sidebar from "../Components/Sidebar.vue";

export default {
    components: { Navbar, Sidebar },
};
</script>
