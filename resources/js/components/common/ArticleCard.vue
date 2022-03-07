<template>
    <!-- TODO: href props化 -->
    <a href="#" class="article-card-wrapper">
        <div class="thumbnail">
            <div class="inside">
                <div class="img"></div>
                <p class="title">{{ title }}</p>
            </div>
        </div>
        <div class="content">
            <p class="description">{{ description }}</p>
            <p class="date">{{ date }}</p>
            <div class="save">
                <button class="save-button">
                    <Icon name="heart_outline" width="20px" />
                </button>
            </div>
        </div>
    </a>
</template>

<script>
import Icon from "../Icon.vue";
export default {
    components: { Icon },
    name: "ArticleCard",
    props: {
        title: {
            type: String,
            required: true,
        },
        description: {
            type: String,
            required: true,
        },
        date: {
            type: String,
            required: true,
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";
// TODO: レスポンシブ対応
// TODO: img反映
.article-card-wrapper {
    background-color: var(--base-bg-color);
    border: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-s);
    overflow: hidden;

    @include np-shadow;

    &:hover > .thumbnail > .inside {
        transform: scale(1.2);
    }

    > .thumbnail {
        position: relative;
        height: 160px;
        border-radius: var(--border-radius-s) var(--border-radius-s) 0 0;
        background-color: var(--gray-500);
        overflow: hidden; // scale用
    }

    > .thumbnail > .inside {
        width: 100%;
        height: 100%;
        transition: transform 0.2s;
    }

    > .thumbnail > .inside > .title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.4rem;
        color: var(--white);
    }

    > .content {
        height: 200px;
        box-sizing: border-box;
        padding: var(--margin-s);
        display: grid;
        grid-template: 1fr 48px / 1fr 1fr;
        grid-template-areas:
            "description description"
            "date save";
    }

    > .content > .description {
        grid-area: description;
        display: flex;
        align-items: center;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--base-text-color);
    }

    > .content > .date {
        grid-area: date;
        font-size: 1.6rem;
        font-weight: 500;
        display: flex;
        align-items: flex-end;
        color: var(--gray-600);
    }

    > .content > .save {
        grid-area: save;
        display: flex;
        align-items: flex-end;
        justify-content: flex-end;
    }
}

.save-button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: var(--base-text-color);
    background-color: var(--base-bg-color);
    outline: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-circle);

    @include np-shadow(3px, 6px);
}
</style>
