<template>
    <Navbar />
    <div class="h-screen flex flex-row flex-wrap">
        <Sidebar />  
            <slot /> 
    </div>
    <!-- end wrapper -->
</template>
<!-- <script src="../Pages/assets/js/scripts.js"></script> -->
<script>
import Navbar from "../Components/Navbar.vue";
import Sidebar from "../Components/Sidebar.vue";

export default {
    components: { Navbar, Sidebar },
};
</script>
<!-- <style scoped> -->
<!-- .report-card:hover .card { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0
4px 6px -2px rgba(0, 0, 0, 0.05); --border-opacity: 1; border-color: #fff;
border-color: rgba(255, 255, 255, var(--border-opacity)); transform:
scale(1.01); } .report-card:hover .footer { padding: 0; border-width: 0; }
.report-card .footer, .report-card .card { transition-property: all;
transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration:
300ms; } .card { border-radius: 0.25rem; --bg-opacity: 1; background-color:
#fff; background-color: rgba(255, 255, 255, var(--bg-opacity)); border-width:
1px; --border-opacity: 1; border-color: #e2e8f0; border-color: rgba(226, 232,
240, var(--border-opacity)); } .card .card-header { border-bottom-width: 1px;
padding: 1.5rem; } .card .card-body { padding: 1.5rem; } .card .card-footer {
border-top-width: 1px; padding: 1.5rem; } -->
<!-- </style> -->
