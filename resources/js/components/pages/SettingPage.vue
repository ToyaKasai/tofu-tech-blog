<template>
  <div class="setting-page-wrapper">
    <a class="link" href="/">
      <Icon name="left_allow" width="32px" />
      戻る
    </a>
    <div class="content">
      <div class="heading">
        <HeadingLv1 heading="Setting" />
      </div>
    </div>
  </div>
</template>

<script>
import Icon from '../Icon.vue';
import HeadingLv1 from '../common/HeadingLv1.vue';

export default {
  name: 'SettingPage',
  components: {
    Icon,
    HeadingLv1,
  },
  props: {
    articles: {
      type: Array,
      default: () => [],
    },
  },
  setup() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.setting-page-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  @include mq('tablet') {
    padding: var(--margin-s);
  }

  @include mq('sp') {
    padding: var(--margin-xs);
  }

  > .content {
    width: var(--width-pc);
    margin-bottom: var(--margin-xl);

    @include mq('tablet') {
      width: 100%;
    }
  }

  > .link {
    display: flex;
    align-items: center;
    column-gap: 8px;
    width: var(--width-pc);
    margin-top: var(--margin-m);
    font-size: 1.4rem;
    color: var(--base-text-color);

    @include mq('tablet') {
      width: 100%;
    }

    &:hover {
      cursor: pointer;
    }
  }

  > .content > .heading {
    margin-top: var(--margin-xl);
  }
}
</style>
