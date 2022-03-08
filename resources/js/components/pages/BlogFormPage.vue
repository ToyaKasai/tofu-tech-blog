<template>
    <div class="blog-form-page-wrapper">
        <div class="contents">
            <form action="" method="" class="form">
                <CsrfToken :csrf="csrf" />
                <!-- TODO: language 選択できるようにしたい -->
                <FormTitleInput
                    name="title"
                    :value="state.title"
                    @update:title="state.title = $event"
                />
                <FormTextarea
                    name="description"
                    :value="state.description"
                    @update:textarea="state.description = $event"
                />
                <FormImageUploader
                    name="thumbnail"
                    @update:image="updateImage"
                />
                <MarkdownEditor
                    name="source"
                    :value="state.source"
                    @update:source="state.source = $event"
                />
                <div class="form-footer">
                    <SwitchToggleButton
                        :value="state.isPublish"
                        label="公開する"
                        @toggle="toggleIsPublish"
                    />
                    <CommonButton type="submit">保存する</CommonButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { reactive } from "vue";
import HeadingLv1 from "../common/HeadingLv1.vue";
import FormTitleInput from "../common/form/FormTitleInput.vue";
import FormImageUploader from "../common/form/FormImageUploader.vue";
import FormTextarea from "../common/form/FormTextarea.vue";
import MarkdownEditor from "../common/form/MarkdownEditor.vue";
import CommonButton from "../common/CommonButton.vue";
import SwitchToggleButton from "../common/SwitchToggleButton.vue";
import CsrfToken from '../common/form/CsrfToken.vue';

/** 新規登録 */
export default {
    name: "BlogFormPage",
    components: {
        HeadingLv1,
        FormTitleInput,
        FormImageUploader,
        FormTextarea,
        MarkdownEditor,
        CommonButton,
        SwitchToggleButton,
        CsrfToken,
    },
    props: {
        csrf: {
            type: String,
            required: true,
        },
    },
    setup() {
        const state = reactive({
            title: null,
            description: null,
            image: null,
            source: "",
            isPublish: false,
        });

        const updateImage = (value) => {
            state.image = value;
        };

        const toggleIsPublish = (value) => {
            state.isPublish = value;
        };

        return {
            state,
            updateImage,
            toggleIsPublish,
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";

.blog-form-page-wrapper {
    background-color: var(--yellow);
    display: flex;
    flex-direction: column;
    align-items: center;

    > .contents {
        width: var(--width-pc);
        margin-top: var(--margin-xl);
    }

    > .contents > .form {
        width: var(--width-pc);
        padding-top: var(--margin-xl);
        display: flex;
        flex-direction: column;
        row-gap: var(--margin-s);
    }
}
.form-footer {
    position: sticky;
    bottom: var(--margin-xs);
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    column-gap: var(--margin-s);
    padding: var(--margin-xs);
    margin-bottom: var(--margin-xs);
    box-sizing: border-box;
    background-color: var(--base-bg-color);
    border-radius: var(--border-radius-s);

    @include np-shadow;
}
</style>
