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
                    <Icon name="heart_outline" />
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
// TODO: レスポンシブ対応
// TODO: img反映
.article-card-wrapper {
    background-color: var(--white);
    border-radius: var(--margin-xs);
    box-shadow: 0 0 20px rgba($color: #000000, $alpha: 0.4);
    overflow: hidden;

    &:hover > .thumbnail > .inside {
        transform: scale(1.2);
    }

    > .thumbnail {
        position: relative;
        height: 160px;
        border-radius: var(--margin-xs) var(--margin-xs) 0 0;
        background-color: var(--dark-gray);
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
        font-weight: 600;
        color: var(--black);
    }

    > .content > .date {
        grid-area: date;
        font-size: 1.6rem;
        font-weight: 600;
        display: flex;
        align-items: flex-end;
        color: var(--dark-gray);
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
}
</style>
