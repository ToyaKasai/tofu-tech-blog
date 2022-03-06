<template>
    <div class="global-header-wrapper">
        <header class="header">
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
                <CommonButton :href="createPath">Add Article</CommonButton>
            </div>
        </header>
    </div>
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
        createPath: {
            type: String,
            default: "",
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";

// TODO: レスポンシブ対応
.global-header-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;

    > .header {
        position: fixed;
        top: var(--margin-xs);
        display: grid;
        grid-template-columns: 1fr repeat(3, auto);
        column-gap: var(--margin-xxs);
        align-items: center;
        background-color: var(--dark-gray);
        box-sizing: border-box;
        padding: var(--margin-xxs) var(--margin-s);
        width: var(--width-pc);
        margin: auto;
        box-shadow: 0 0 var(--margin-xs) rgba($color: #000000, $alpha: 0.3);
        border-radius: var(--border-radius-xs);
        z-index: var(--header-z-index);
    }

    > .header > .title > .link {
        font-size: 1.8rem;
        color: var(--black);
        font-weight: bold;
        color: var(--white);
    }

    > .header > .setting,
    > .header > .search {
        display: flex;
        align-items: center;
        color: var(--white);
    }
}
</style>
