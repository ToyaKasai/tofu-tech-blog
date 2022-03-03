<template>
    <header class="global-header-wrapper">
        <p>a</p>
    </header>
</template>

<script>
import styleVariables from "../styleVariables.js";

export default {
    setup() {
        const { color } = styleVariables;
        return {
            color,
        };
    },
};
</script>

<style lang="scss" scoped>
header {
    background: v-bind(color);
}
</style>
