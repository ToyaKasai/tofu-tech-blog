<template>
  <div class="form-textarea-wrapper">
    <textarea
      class="input"
      :name="name"
      :placeholder="placeholder"
      v-model="input"
    ></textarea>
  </div>
</template>

<script>
import { computed } from 'vue';

/** テキストエリアフォーム */
export default {
  name: 'FormTextarea',
  props: {
    name: {
      type: String,
      required: true,
    },
    placeholder: {
      type: String,
      default: 'description',
    },
    value: {
      type: String,
      default: '',
    },
  },
  setup(props, { emit }) {
    const input = computed({
      get: () => props.value,
      set: (value) => {
        emit('update:textarea', value);
      },
    });

    return {
      input,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../../sass/_mixins.scss';

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
    font-family: inherit;
    font-size: 1.6rem;
    font-weight: 500;
    color: var(--base-text-color);

    @include np-shadow;

    &:focus {
      @include np-inner-shadow;
    }
  }
}
</style>
