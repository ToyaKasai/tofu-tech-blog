<template>
  <div class="accordion-wrapper">
    <div class="header" @click="toggleIsOpen">
      <p class="title">{{ title }}</p>
      <div class="icon">
        <Icon :name="isOpen ? 'minus' : 'plus'" />
      </div>
    </div>
    <transition
      name="slide"
      @before-enter="beforeEnter"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
    >
      <div
        v-show="isOpen"
        class="content"
        :style="{
          height: `${contentHeight}px`,
        }"
      >
        <slot></slot>
      </div>
    </transition>
  </div>
</template>

<script>
import Icon from '../Icon';

/** アコーディオンラッパー */
export default {
  name: 'Accordion',
  components: { Icon },

  props: {
    title: {
      type: String,
      required: true,
    },
    isOpen: {
      type: Boolean,
      default: false,
    },
    contentHeight: {
      type: Number,
      default: 0,
    },
  },
  setup(props, { emit }) {
    const toggleIsOpen = () => {
      emit('toggle', !props.isOpen);
    };

    /** スライドアニメーション用 */
    const beforeEnter = (e) => {
      e.style.height = '0';
    };
    const enter = (e) => {
      e.style.height = e.scrollHeight + 'px';
    };
    const beforeLeave = (e) => {
      e.style.height = e.scrollHeight + 'px';
    };
    const leave = (e) => {
      e.style.height = '0';
    };

    return {
      toggleIsOpen,
      beforeEnter,
      enter,
      beforeLeave,
      leave,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.accordion-wrapper {
  padding: var(--margin-xxs) var(--margin-s);
  box-sizing: border-box;
  border-radius: var(--border-radius-xs);

  @include np-shadow;

  > .header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    &:hover {
      cursor: pointer;
    }
  }

  > .header > .title {
    font-size: 1.4rem;
    font-weight: bold;
  }

  > .header > .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: var(--border-radius-circle);
    padding: 8px;
    color: var(--gray-600);

    @include np-shadow;
  }

  > .content {
    box-sizing: border-box;
    overflow: hidden;
    transition: height 250ms ease-in-out;
    user-select: none;
  }
}

.slide-enter-active,
.slide-leave-active {
  animation-duration: 250ms;
  animation-fill-mode: both;
}
</style>
