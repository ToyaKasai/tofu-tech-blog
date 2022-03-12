<template>
  <div class="pickup-section-wrapper">
    <Accordion
      :default-value="mode === PAGE_SECTION_MODE"
      title="ピックアップ記事を設定する"
    >
      <form class="pickup-form" method="POST" :action="updatePickupPath">
        <CsrfToken :csrf="csrf" />
        <!-- TODO: value形式確認 -->
        <div class="article-info">
          <template v-if="changedStatuses.length !== 0">
            <template
              v-for="(status, index) in changedStatuses"
              :key="status.id"
            >
              <!-- form value -->
              <input
                type="hidden"
                :name="`changed_statuses[${index}][id]`"
                :value="status.id"
              />
              <input
                type="hidden"
                :name="`changed_statuses[${index}][status]`"
                :value="status.status"
              />
            </template>
          </template>
          <!-- articles -->
          <template v-for="article in articles" :key="article.id">
            <div class="article">
              <!-- TODO: チェックボックスコンポーネント化-->
              <input
                type="checkbox"
                class="checkbox"
                :checked="article.is_pickup === true"
                @change="changeStatus(article.id, $event.target.checked)"
              />
              <p class="title">{{ article.title }}</p>
              <p class="date">
                {{ parseDate(article.updated_at, 'yyyy年M月d日 mm:dd') }}
              </p>
            </div>
          </template>
        </div>
        <div class="submit">
          <CommonButton :disabled="changedStatuses.length === 0" type="submit"
            >保存する
          </CommonButton>
        </div>
      </form>
    </Accordion>
  </div>
</template>

<script>
import { ref } from 'vue';
import parseDate from '../../../lib/parseDate.js';
import HeadingLv1 from '../../common/HeadingLv1.vue';
import Accordion from '../../common/Accordion.vue';
import CsrfToken from '../../common/form/CsrfToken.vue';
import CommonButton from '../CommonButton';

export default {
  name: 'PickupSection',
  components: {
    HeadingLv1,
    CsrfToken,
    Accordion,
    CommonButton,
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
    const PAGE_SECTION_MODE = 'pickup';
    const changedStatuses = ref([]);

    const changeStatus = (id, status) => {
      if (changedStatuses.value.length !== 0) {
        const changedArticleIndex = changedStatuses.value.findIndex(
          (status) => status.id === id,
        );

        // すでにステータス変更していた場合
        if (changedArticleIndex !== -1) {
          const changedStatus = {
            ...changedStatuses.value[changedArticleIndex],
            status: status,
          };

          changedStatuses.value = [...changedStatuses.value].map(
            (status, index) =>
              index === changedArticleIndex
                ? {
                    ...changedStatus,
                  }
                : { ...status },
          );
          return;
        }
      }

      changedStatuses.value = [
        ...changedStatuses.value,
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
      PAGE_SECTION_MODE,
      changedStatuses,
      changeStatus,
      handleClickLink,
      parseDate,
    };
  },
};
</script>

<style lang="scss" scoped>
.pickup-form {
  > .submit {
    margin-top: var(--margin-m);
    display: flex;
    justify-content: flex-end;
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
