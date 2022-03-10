<template>
  <div class="form-text-input-wrapper">
    <input
      class="input"
      type="text"
      :name="name"
      :placeholder="placeholder"
      v-model="input"
    />
  </div>
</template>

<script>
  import { computed } from 'vue';

  /** タイトルフォーム */
  export default {
    name: 'FormTitleInput',
    props: {
      name: {
        type: String,
        required: true,
      },
      placeholder: {
        type: String,
        default: 'Title',
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
          emit('update:title', value);
        },
      });

      return {
        input,
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
      color: var(--base-text-color);
    }
  }
</style>
