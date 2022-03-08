<template>
    <div class="switch-toggle-button-wrapper">
        <input type="hidden" :name="name" :value="value" />
        <div
            class="switch"
            :class="{ '-active': value }"
            @click="handleToggle"
        ></div>
        <p class="label" :class="{ '-active': value }">{{ label }}</p>
    </div>
</template>

<script>
export default {
    name: "SwitchToggleButton",
    props: {
        name: {
            type: String,
            default: false,
        },
        value: {
            type: Boolean,
            default: false,
        },
        label: {
            type: String,
            required: true,
        },
    },
    setup(props, { emit }) {
        const handleToggle = () => {
            emit("toggle", !props.value);
        };
        return {
            handleToggle,
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_mixins.scss";

.switch-toggle-button-wrapper {
    display: flex;
    align-items: center;
    column-gap: var(--margin-xxs);

    > .switch {
        cursor: pointer;
        position: relative;
        width: 72px;
        height: 34px;
        background-color: var(--base-bg-color);
        border-radius: 25px;

        @include np-inner-shadow;

        &::before {
            content: "";
            display: block;
            position: absolute;
            top: 4px;
            left: 4px;
            width: 26px;
            height: 26px;
            background-color: var(--gray-500);
            border-radius: var(--border-radius-circle);
            transition: all 0.2s;
        }

        &.-active::before {
            margin-left: 52%;
            background-color: var(--blue);
        }
    }

    > .label {
        font-weight: 500;
        font-size: 1.4rem;
        color: var(--gray-500);

        &.-active {
            color: var(--base-text-color);
        }
    }
}
</style>
