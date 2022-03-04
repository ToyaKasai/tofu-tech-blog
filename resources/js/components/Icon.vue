<template>
    <svg-vue class="icon-wrapper" :icon="name" />
</template>

<script>
/**
 * svgアイコンのVueコンポーネント
 */
export default {
    name: "Icon",
    props: {
        name: {
            type: String,
            required: true,
        },
        width: {
            type: String,
            default: "24px",
        },
        height: {
            type: String,
            default: "",
        },
    },
};
</script>

<style lang="scss" scoped>
.icon-wrapper {
    width: v-bind(width);
    height: v-bind(height);
}
</style>
