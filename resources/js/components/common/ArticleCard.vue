<template>
    <a :href="viewPath" class="article-card-wrapper">
        <div class="thumbnail">
            <div class="inside">
                <img :src="thumbnailSrc" class="image" />
                <p class="title">{{ title }}</p>
            </div>
        </div>
        <div class="content">
            <div class="description">
                <p class="text">
                    {{ description }}
                </p>
            </div>
            <p class="date">{{ parsedDate }}</p>
            <div class="save">
                <div class="save-button">
                    <template v-if="isSave">
                        <Icon class="heart" name="heart" />
                    </template>
                    <template v-else>
                        <Icon name="heart_outline" />
                    </template>
                </div>
            </div>
        </div>
    </a>
</template>

<script>
import { computed } from "vue";
import Icon from "../Icon.vue";
import {
    DEFAULT_THUMBNAIL_PATH,
    STORAGE_IMAGE_PATH,
} from "../../lib/storageImage.js";
import parseArticlePath from "../../lib/parseArticlePath.js";
import parseDate from "../../lib/parseDate.js";

export default {
    components: { Icon },
    name: "ArticleCard",
    props: {
        id: {
            type: Number,
            required: true,
        },
        isSave: {
            type: Boolean,
            required: true,
        },
        thumbnailPath: {
            type: String,
            default: "",
        },
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
    setup(props) {
        const thumbnailSrc = computed(() =>
            props.thumbnailPath
                ? `${STORAGE_IMAGE_PATH}${props.thumbnailPath}`
                : DEFAULT_THUMBNAIL_PATH
        );

        const viewPath = computed(() => parseArticlePath(props.id).view);

        const parsedDate = parseDate(props.date);

        return {
            thumbnailSrc,
            viewPath,
            parsedDate,
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";
// TODO: レスポンシブ対応
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
        background-color: var(--gray-100);
        overflow: hidden; // scale用
    }

    > .thumbnail > .inside {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.2s;

        // overlay
        &::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba($color: #000000, $alpha: 0.5);
        }
    }

    > .thumbnail > .inside > .image {
        display: block;
        margin: auto;
        max-height: 100%;
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
    }

    > .content > .description > .text {
        height: fit-content;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--base-text-color);

        @include line-limit;
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

    > .heart {
        color: var(--red);
    }
}
</style>
