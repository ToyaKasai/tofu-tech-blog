<template>
    <div class="markdown-preview-wrapper">
        <VueMarkdown
            :breaks="true"
            :html="true"
            :linkify="true"
            class="markdown-preview"
            :source="value"
        />
    </div>
</template>

<script>
import VueMarkdown from "vue3-markdown-it";

/** マークダウンプレビュー */
export default {
    name: "MarkdownPreview",
    components: {
        VueMarkdown,
    },
    props: {
        value: {
            type: String,
            default: "",
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";
@import "../../../sass/markdownPreview.scss";

.markdown-preview-wrapper {
    width: 100%;
    background-color: var(--base-bg-color);
    border: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-s);
    padding: var(--margin-s);
    box-sizing: border-box;

    @include np-shadow;
}
</style>
