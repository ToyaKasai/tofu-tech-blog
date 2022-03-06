<template>
    <div class="form-text-input-wrapper">
        <input
            class="input"
            type="text"
            :name="name"
            :placeholder="placeholder"
            @input="handleInputTitle"
        />
    </div>
</template>

<script>
// 記事作成フォームのタイトルパーツ
export default {
    name: "FormTitleInput",
    props: {
        name: {
            type: String,
            default: "title",
        },
        placeholder: {
            type: String,
            default: "Title",
        },
    },
    setup(_, { emit }) {
        const handleInputTitle = (e) => {
            emit("update:title", e.target.value);
        };

        return {
            handleInputTitle,
        };
    },
};
</script>

<style lang="scss" scoped>
.form-text-input-wrapper {
    > .input {
        display: block;
        width: 100%;
        border: none;
        outline: none;
        background-color: rgba($color: #000000, $alpha: 0);
        font-weight: bold;
        font-size: 2.8rem;
    }
}
</style>
