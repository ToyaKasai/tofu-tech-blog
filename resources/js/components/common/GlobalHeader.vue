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
                <CommonButton>Add Article</CommonButton>
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
        column-gap: var(--margin-xs);
        align-items: center;
        background: var(--white);
        box-sizing: border-box;
        padding: var(--margin-xs) var(--margin-m);
        width: var(--width-pc);
        margin: auto;
        box-shadow: 0 0 var(--margin-xs) rgba($color: #000000, $alpha: 0.3);
        border-radius: var(--margin-xxs);
    }

    > .header > .title > .link {
        font-size: 18px;
        color: var(--black);
        font-weight: 600;
    }

    > .header > .setting,
    > .header > .search {
        display: flex;
        align-items: center;
        color: var(--dark-gray);
    }
}
</style>
