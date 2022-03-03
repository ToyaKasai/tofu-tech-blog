<template>
    <header class="global-header-wrapper">
        <p>a</p>
    </header>
</template>

<script>
import STYLE_VARIABLES from "../styleVariables.js";

export default {
    setup() {
        const { color } = STYLE_VARIABLES;
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
