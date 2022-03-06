<template>
    <div class="blog-form-page-wrapper">
        <MainVisual :heading="heading" />
        <form action="" method="" class="form">
            <!-- TODO: csrf入れる -->
            <!-- TODO: language 選択できるようにしたい -->
            <FormTitleInput @update:title="updateTitle" />
            <FormImageUploader @update:image="updateImage" />
        </form>
    </div>
</template>

<script>
import { reactive, computed } from "vue";
import MainVisual from "../common/MainVisual.vue";
import FormTitleInput from "../common/form/FormTitleInput.vue";
import FormImageUploader from "../common/form/FormImageUploader.vue";

/** 新規登録 */
export default {
    name: "BlogFormPage",
    components: {
        MainVisual,
        FormTitleInput,
        FormImageUploader,
    },
    props: {
        heading: {
            type: String,
            default: "Add Article",
        },
    },
    setup() {
        const state = reactive({
            title: null,
            image: null,
        });
        const updateTitle = (value) => {
            state.title = value;
        };

        const updateImage = (value) => {
            state.image = value;
        };

        return {
            state,
            updateTitle,
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

    > .form {
        width: var(--width-pc);
        padding: var(--margin-xl) 0;
        display: flex;
        flex-direction: column;
        row-gap: var(--margin-s);
    }
}
</style>
