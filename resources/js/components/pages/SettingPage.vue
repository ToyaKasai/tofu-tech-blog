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

      <!-- ピックアップ記事設定 -->
      <div class="pickup">
        <PickupSection
          :csrf="csrf"
          :articles="articles"
          :update-pickup-path="updatePickupPath"
          :mode="mode"
        />
      </div>
    </div>
  </div>
</template>

<script>
import HeadingLv1 from '../common/HeadingLv1.vue';
import Icon from '../Icon.vue';
import Accordion from '../common/Accordion.vue';
import CsrfToken from '../common/form/CsrfToken.vue';
import PickupSection from '../common/setting/PickupSection.vue';
import { ref } from 'vue';
import parseDate from '../../lib/parseDate.js';

export default {
  name: 'SettingPage',
  components: {
    CsrfToken,
    Accordion,
    HeadingLv1,
    PickupSection,
    Icon,
  },
  props: {
    csrf: {
      type: String,
      required: true,
    },
    articles: {
      type: Array,
      default: () => [],
    },
    updatePickupPath: {
      type: String,
      required: true,
    },
    mode: {
      type: String,
      default: '',
    },
  },
  setup() {
    const changedStatusArticles = ref([]);

    const changeStatus = (id, status) => {
      changedStatusArticles.value = [
        ...changedStatusArticles.value,
        {
          id,
          status,
        },
      ];
    };

    return {
      changedStatusArticles,
      changeStatus,
      parseDate,
    };
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

  > .content > .pickup {
    margin-top: var(--margin-l);
  }
}
</style>
