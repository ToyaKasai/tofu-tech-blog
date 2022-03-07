<template>
    <div class="form-textarea-wrapper">
        <textarea
            class="input"
            :name="name"
            :placeholder="placeholder"
            @input="handleInputTextarea"
        ></textarea>
    </div>
</template>

<script>
/** テキストエリアフォーム */
export default {
    name: "FormTextarea",
    props: {
        name: {
            type: String,
            default: "description",
        },
        placeholder: {
            type: String,
            default: "description",
        },
    },
    setup(_, { emit }) {
        const handleInputTextarea = (e) => {
            emit("update:textarea", e.target.value);
        };

        return {
            handleInputTextarea,
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../../sass/_mixins.scss";

.form-textarea-wrapper {
    > .input {
        display: block;
        padding: var(--margin-s);
        box-sizing: border-box;
        outline: 1px solid var(--base-border-color);
        border: none;
        border-radius: var(--border-radius-s);
        background-color: var(--base-bg-color);
        width: 100%;
        height: 200px;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--base-text-color);

        @include np-shadow;

        &:focus {
            outline: none;
            @include np-inner-shadow;
            cursor: pointer;
        }
    }
}
</style>
