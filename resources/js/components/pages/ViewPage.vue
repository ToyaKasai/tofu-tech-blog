<template>
    <div class="view-page-wrapper">
        <a class="link" href="/">
            <Icon name="left_allow" width="32px" />
            TOPへ戻る
        </a>
        <div class="thumbnail">
            <img class="image" :src="thumbnailSrc" />
        </div>
        <div class="content">
            <p class="title">{{ article.title }}</p>
            <div class="date">
                <div class="create">
                    <Icon name="write" />
                    {{ createDate }}
                </div>
                <div class="update">
                    <Icon name="update" />
                    {{ updateDate }}
                </div>
            </div>
            <div class="article-content">
                <div class="side">
                    <div class="content">
                        <button class="save-button">
                            <template v-if="article.is_save">
                                <Icon class="heart" name="heart" />
                            </template>
                            <template v-else>
                                <Icon name="heart_outline" />
                            </template>
                        </button>
                        <a :href="editPath" class="save-button">
                            <Icon name="write" />
                        </a>
                    </div>
                </div>
                <MarkdownPreview :value="article.source" />
            </div>
        </div>
    </div>
</template>

<script>
import { computed } from "vue";
import {
    STORAGE_IMAGE_PATH,
    DEFAULT_THUMBNAIL_PATH,
} from "../../lib/storageImage";
import Icon from "../Icon.vue";
import MarkdownPreview from "../common/MarkdownPreview.vue";
import parseArticlePath from "../../lib/parseArticlePath";
import parseDate from "../../lib/parseDate";

/** 記事閲覧ページ */
export default {
    name: "ViewPage",
    components: {
        Icon,
        MarkdownPreview,
    },
    props: {
        article: {
            type: Object,
            default: () => ({}),
        },
    },
    setup(props) {
        const thumbnailSrc = computed(() =>
            props.article.thumbnail_path
                ? `${STORAGE_IMAGE_PATH}${props.article.thumbnail_path}`
                : DEFAULT_THUMBNAIL_PATH
        );

        const createDate = computed(() =>
            parseDate(props.article.created_at, "yyyy年M月d日 HH:mm")
        );

        const updateDate = computed(() =>
            parseDate(props.article.updated_at, "yyyy年M月d日 HH:mm")
        );

        const editPath = computed(
            () => parseArticlePath(props.article.id).edit
        );

        return {
            thumbnailSrc,
            createDate,
            updateDate,
            editPath,
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";

.view-page-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    > .link {
        display: flex;
        align-items: center;
        column-gap: 8px;
        width: var(--width-pc);
        margin-top: var(--margin-m);
        font-size: 1.4rem;
        color: var(--base-text-color);
    }

    > .thumbnail {
        width: 100%;
        height: 180px;
        padding: var(--margin-m);
        text-align: center;
    }

    > .thumbnail > .image {
        height: 100%;
        // object-fit: cover;
        // object-position: 50% 50%;
    }

    > .content {
        width: var(--width-pc);
    }

    > .content > .date {
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: var(--margin-xs);
    }

    > .content > .date > .create,
    > .content > .date > .update {
        display: flex;
        align-items: center;
        column-gap: 8px;
        font-size: 1.4rem;
        color: var(--gray-600);
        margin-top: var(--margin-xxs);
    }

    > .content > .title {
        font-size: 2.8rem;
        font-weight: bold;
        text-align: center;
    }
}

.article-content {
    display: grid;
    grid-template-columns: auto 1fr;
    column-gap: var(--margin-m);
    padding: var(--margin-xl) 0;

    > .side > .content {
        position: sticky;
        top: var(--margin-l);
        display: flex;
        flex-direction: column;
        row-gap: var(--margin-xs);
    }
}

.save-button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    color: var(--base-text-color);
    background-color: var(--base-bg-color);
    outline: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-circle);

    @include np-shadow(3px, 6px);

    &:hover {
        @include np-inner-shadow(3px, 6px);
    }

    > .heart {
        color: var(--red);
    }
}
</style>
