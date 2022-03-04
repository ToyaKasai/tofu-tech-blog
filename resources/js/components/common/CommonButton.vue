<template>
    <template v-if="href">
        <a class="common-button-wrapper" :href="href">
            <slot />
        </a>
    </template>
    <template v-else>
        <button class="common-button-wrapper" :type="type">
            <slot />
        </button>
    </template>
</template>

<script>
export default {
    name: "CommonButton",
    props: {
        type: {
            type: String,
            default: "button",
        },
        href: {
            type: String,
            default: "",
        },
    },
};
</script>

<style lang="scss" scoped>
.common-button-wrapper {
    display: flex;
    align-items: center;
    background-color: var(--dark-blue);
    padding: var(--margin-xxs) var(--margin-xs);
    box-sizing: border-box;
    font-weight: bold;
    font-size: 1.4rem;
    line-height: 1;
    color: var(--white);
    border-radius: 8px;
    box-shadow: 0 0 10px rgba($color: #000000, $alpha: 0.1);

    &:hover {
        cursor: pointer;
    }
}
</style>
