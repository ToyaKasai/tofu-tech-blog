<template>
  <div class="global-header-wrapper">
    <header class="header">
      <div class="title">
        <a class="link" href="/">
          {{ headerTitle }}
        </a>
      </div>
      <a :href="settingPath" class="icon">
        <Icon name="setting" width="20px" />
      </a>
      <a :href="searchPath" class="icon">
        <Icon name="search" />
      </a>
      <div class="register">
        <CommonButton :href="createPath">Add Article</CommonButton>
      </div>
    </header>
  </div>
</template>

<script>
import Icon from '../Icon.vue';
import CommonButton from './CommonButton.vue';
import useMq from '../../uses/useMq.js';

export default {
  name: 'GlobalHeader',
  components: {
    Icon,
    CommonButton,
  },
  props: {
    headerTitle: {
      type: String,
      default: 'TOFU TECH BLOG',
    },
    createPath: {
      type: String,
      default: '',
    },
    settingPath: {
      type: String,
      default: '/setting',
    },
    searchPath: {
      type: String,
      default: '/search',
    },
  },
  setup() {
    const { mq } = useMq();

    return {
      mq,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.global-header-wrapper {
  width: 100%;
  display: flex;
  justify-content: center;
  box-sizing: border-box;

  @include mq('tablet') {
    padding: 0 var(--margin-s);
  }

  @include mq('sp') {
    padding: 0 var(--margin-xs);
  }

  > .header {
    display: grid;
    grid-template-columns: 1fr repeat(3, auto);
    column-gap: var(--margin-xxs);
    align-items: center;
    box-sizing: border-box;
    width: var(--width-pc);
    margin: auto;
    margin-top: var(--margin-s);
    padding: var(--margin-xxs) var(--margin-s);
    background-color: var(--base-bg-color);
    border: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-s);

    @include np-shadow;

    @include mq('tablet') {
      width: 100%;
    }

    @include mq('sp') {
      width: 100%;
    }
  }

  > .header > .title > .link {
    font-size: 1.8rem;
    font-weight: 500;
    color: var(--base-text-color);
  }

  > .header > .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    color: var(--base-text-color);
    background-color: var(--base-bg-color);
    outline: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-xs);

    @include np-shadow(3px, 6px);

    &:hover {
      outline: none;
      @include np-inner-shadow;
      cursor: pointer;
    }
  }
}
</style>
