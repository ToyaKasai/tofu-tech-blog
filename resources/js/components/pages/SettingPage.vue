<template>
  <div class="setting-page-wrapper">
    <button class="link" @click="handleClickLink">
      <Icon name="left_allow" width="32px" />
      戻る
    </button>
    <div class="content">
      <div class="heading">
        <HeadingLv1 heading="Setting" />
      </div>
      <div class="accordion">
        <Accordion
          :default-value="mode === 'setting'"
          title="ピックアップ記事を設定する"
        >
          <form :action="updatePickupPath">
            <CsrfToken :csrf="csrf" />
            <template v-for="article in articles" :key="article.id">
              <input
                type="hidden"
                name="changed_statuses"
                :value="changedStatusArticles"
              />
              <div class="article-info">form</div>
            </template>
          </form>
        </Accordion>
      </div>
    </div>
  </div>
</template>

<script>
import HeadingLv1 from '../common/HeadingLv1';
import Icon from '../Icon.vue';
import Accordion from '../common/Accordion';
import CsrfToken from '../common/form/CsrfToken';
import { ref } from 'vue';

export default {
  name: 'SettingPage',
  components: {
    CsrfToken,
    Accordion,
    HeadingLv1,
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
      default: 'setting',
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

    const handleClickLink = () => {
      history.back();
    };

    return {
      changedStatusArticles,
      changeStatus,
      handleClickLink,
    };
  },
};
</script>

<style lang="scss" scoped>
.setting-page-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  > .content {
    width: var(--width-pc);
  }

  > .link {
    display: flex;
    align-items: center;
    column-gap: 8px;
    width: var(--width-pc);
    margin-top: var(--margin-m);
    font-size: 1.4rem;
    color: var(--base-text-color);

    &:hover {
      cursor: pointer;
    }
  }

  > .content > .heading {
    margin-top: var(--margin-xl);
  }
}
</style>
