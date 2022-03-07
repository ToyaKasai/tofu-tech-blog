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
@import "../../../sass/_mixins.scss";

.common-button-wrapper {
    display: flex;
    align-items: center;
    background-color: var(--base-bg-color);
    padding: var(--margin-xxs) var(--margin-xs);
    box-sizing: border-box;
    font-size: 1.4rem;
    font-weight: 500;
    line-height: 1;
    color: var(--blue);
    outline: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-xxs);

    @include np-shadow(3px, 6px);

    &:hover {
        outline: none;
        @include np-inner-shadow;
        cursor: pointer;
    }
}
</style>
