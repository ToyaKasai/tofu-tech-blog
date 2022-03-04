<template>
    <header class="global-header-wrapper">
        <div class="title">
            <a class="link" href="/">
                {{ headerTitle }}
            </a>
        </div>
        <button class="setting">
            <Icon name="setting" width="20px" />
        </button>
        <button class="search">
            <Icon name="search" />
        </button>
        <div class="register">
            <CommonButton>Add Article</CommonButton>
        </div>
    </header>
</template>

<script>
import Icon from "../Icon.vue";
import CommonButton from "./CommonButton.vue";
export default {
    name: "GlobalHeader",
    components: {
        Icon,
        CommonButton,
    },
    props: {
        headerTitle: {
            type: String,
            default: "TOFU TECH BLOG",
        },
    },
};
</script>

<style lang="scss" scoped>
.global-header-wrapper {
    position: fixed;
    top: var(--margin-xs);
    left: 50%;
    transform: translateX(-50%);
    display: grid;
    grid-template-columns: 1fr repeat(3, auto);
    column-gap: var(--margin-xs);
    align-items: center;
    background: var(--white);
    box-sizing: border-box;
    padding: var(--margin-xs) var(--margin-m);
    width: var(--width-pc);
    margin: auto;
    box-shadow: 0 0 var(--margin-xs) rgba($color: #000000, $alpha: 0.1);
    border-radius: var(--margin-xxs);

    > .title > .link {
        font-size: 18px;
        color: var(--black);
        font-weight: 600;
    }

    > .setting,
    > .search {
        display: flex;
        align-items: center;
        color: var(--dark-gray);
    }
}
</style>
