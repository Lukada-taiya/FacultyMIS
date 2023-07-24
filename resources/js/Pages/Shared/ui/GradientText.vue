<template>
    <div :class="htype">
        <slot></slot>
    </div>
</template>
<script> 
  export default {
    props: {
      htype: {
        type: String,
        required: false,
        default: null,
      }
    }
}
</script>
<style scoped>
div {
    background: linear-gradient(to right, #ff9900, #febe5d, #fff);
    -webkit-text-fill-color: transparent;
    background-clip: text;
    -webkit-background-clip: text;
}

.h1 {
    font-size: 2rem;
    font-weight: bold;
}
</style>