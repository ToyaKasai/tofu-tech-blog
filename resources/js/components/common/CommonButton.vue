<template>
  <template v-if="href">
    <a class="common-button-wrapper" :class="buttonClasses" :href="href">
      <slot />
    </a>
  </template>
  <template v-else>
    <button class="common-button-wrapper" :class="buttonClasses" :type="type">
      <slot />
    </button>
  </template>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'CommonButton',
  props: {
    type: {
      type: String,
      default: 'button',
    },
    href: {
      type: String,
      default: '',
    },
    isFull: {
      type: Boolean,
      default: false,
    },
    textGray: {
      type: Boolean,
      default: false,
    },
  },
  setup(props) {
    const buttonClasses = computed(() => ({
      '-full': props.isFull,
      '-gray': props.textGray,
    }));
    return {
      buttonClasses,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.common-button-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--base-bg-color);
  padding: var(--margin-xxs) var(--margin-xs);
  box-sizing: border-box;
  font-size: 1.4rem;
  font-weight: 600;
  font-family: inherit;
  line-height: 1;
  color: var(--blue);
  outline: 1px solid var(--base-border-color);
  border-radius: var(--border-radius-xxs);

  &.-full {
    width: 100%;
  }

  &.-gray {
    color: var(--base-text-color);
  }

  @include np-shadow(3px, 6px);

  &:hover {
    outline: none;
    @include np-inner-shadow;
    cursor: pointer;
  }
}
</style>
