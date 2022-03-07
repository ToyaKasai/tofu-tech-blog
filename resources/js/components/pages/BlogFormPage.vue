<template>
    <div class="blog-form-page-wrapper">
        <div class="contents">
            <form action="" method="" class="form">
                <!-- TODO: csrf入れる -->
                <!-- TODO: language 選択できるようにしたい -->
                <FormTitleInput name="title" @update:title="updateTitle" />
                <FormTextarea
                    name="description"
                    @update:textarea="updateDescription"
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
            </form>
        </div>
    </div>
</template>

<script>
import { reactive, computed } from "vue";
import HeadingLv1 from "../common/HeadingLv1.vue";
import FormTitleInput from "../common/form/FormTitleInput.vue";
import FormImageUploader from "../common/form/FormImageUploader.vue";
import FormTextarea from "../common/form/FormTextarea.vue";
import MarkdownEditor from "../common/form/MarkdownEditor.vue";

/** 新規登録 */
export default {
    name: "BlogFormPage",
    components: {
        HeadingLv1,
        FormTitleInput,
        FormImageUploader,
        FormTextarea,
        MarkdownEditor,
    },
    setup() {
        const state = reactive({
            title: null,
            description: null,
            image: null,
            source: "",
        });
        const updateTitle = (value) => {
            state.title = value;
        };

        const updateDescription = (value) => {
            state.description = value;
        };

        const updateImage = (value) => {
            state.image = value;
        };

        return {
            state,
            updateTitle,
            updateDescription,
            updateImage,
        };
    },
};
</script>

<style lang="scss" scoped>
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
        padding: var(--margin-xl) 0;
        display: flex;
        flex-direction: column;
        row-gap: var(--margin-s);
    }
}
</style>
