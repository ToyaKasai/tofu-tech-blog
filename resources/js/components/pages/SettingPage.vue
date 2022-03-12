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

      <!-- ピックアップ記事設定 -->
      <div class="pickup">
        <Accordion
          :default-value="mode === 'setting'"
          title="ピックアップ記事を設定する"
        >
          <form :action="updatePickupPath">
            <CsrfToken :csrf="csrf" />
            <!-- TODO: value形式確認 -->
            <input
              type="hidden"
              name="changed_statuses"
              :value="changedStatusArticles"
            />
            <div class="article-info">
              <template v-for="article in articles" :key="article.id">
                <div class="article">
                  <!-- TODO: チェックボックスコンポーネント化-->
                  <input type="checkbox" class="checkbox" />
                  <p class="title">{{ article.title }}</p>
                  <p class="date">
                    {{ parseDate(article.updated_at, 'yyyy年M月d日 mm:dd') }}
                  </p>
                </div>
              </template>
            </div>
          </form>
        </Accordion>
      </div>
    </div>
  </div>
</template>

<script>
import HeadingLv1 from '../common/HeadingLv1.vue';
import Icon from '../Icon.vue';
import Accordion from '../common/Accordion.vue';
import CsrfToken from '../common/form/CsrfToken.vue';
import { ref } from 'vue';
import parseDate from '../../lib/parseDate.js';

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
      parseDate,
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

  > .content > .pickup {
    margin-top: var(--margin-l);
  }
}

.article-info {
  display: grid;
  grid-template-columns: 1fr;
  row-gap: var(--margin-xs);

  > .article {
    display: grid;
    grid-template-columns: auto 1fr auto auto;
    align-items: center;
    font-size: 1.6rem;
    column-gap: var(--margin-xs);
    padding: var(--margin-xxs);
    border-bottom: 1px solid var(--gray-600);
  }

  > .article > .title {
    font-weight: 600;
  }

  > .article > .date {
    font-weight: 500;
    color: var(--gray-600);
  }
}
</style>
