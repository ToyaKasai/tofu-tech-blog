<template>
    <div class="form-image-uploader-wrapper">
        <div class="uploader">
            <div class="content">
                <div class="icon">
                    <Icon name="image" width="64px" />
                </div>
                <p class="text">{{ uploaderText }}</p>
            </div>
            <CommonButton class="button">
                <input
                    class="input"
                    type="file"
                    :name="name"
                    :accept="FILE_ACCEPT_EXTENSIONS"
                    @input="handleUploadImage"
                />
                Upload Thumbnail
            </CommonButton>
        </div>
    </div>
</template>

<script>
import { computed, ref } from "@vue/runtime-core";
import Icon from "../../Icon.vue";
import CommonButton from "../CommonButton.vue";
// 記事作成フォームのサムネイルパーツ
export default {
    components: {
        CommonButton,
        Icon,
    },
    name: "FormImageUploader",
    props: {
        name: {
            type: String,
            default: "thumbnail",
        },
    },
    setup(_, { emit }) {
        const FILE_ACCEPT_EXTENSIONS = [".jpeg", ".jpg", ".png"];

        const file = ref(null);

        const uploaderText = computed(() =>
            file.value ? file.value.name : "Please Upload Thumbnail File!"
        );

        const handleUploadImage = (e) => {
            file.value = e.target.files[0];
            emit("update:image", e.target.files[0]);
        };

        return {
            FILE_ACCEPT_EXTENSIONS,
            uploaderText,
            handleUploadImage,
        };
    },
};
</script>

<style lang="scss" scoped>
.form-image-uploader-wrapper {
    display: flex;
    justify-content: center;
    background-color: var(--white);
    padding: var(--margin-m);
    border-radius: var(--border-radius-xs);
    box-shadow: 0 0 10px rgba($color: #000000, $alpha: 0.2);

    > .uploader {
        display: flex;
        align-items: center;
        flex-direction: column;
        width: 100%;
        height: 100%;
        border: 2px dotted var(--dark-gray);
        border-radius: var(--border-radius-xs);
        padding: var(--margin-s);
    }

    > .uploader > .content {
        display: flex;
        flex-direction: column;
        row-gap: var(--margin-xs);
        padding: var(--margin-m);
        text-align: center;
        color: var(--dark-gray);
    }

    > .uploader > .content > .text {
        font-size: 1.4rem;
        font-weight: bold;
    }

    > .uploader > .button {
        position: relative;
    }
    > .uploader > .button > .input {
        opacity: 0;
        display: block;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;

        &::-webkit-file-upload-button {
            cursor: pointer;
        }
    }
}
</style>
