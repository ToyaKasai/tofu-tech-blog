<template>
  <div class="setting-page-wrapper">
    <a class="link" href="/">
      <Icon name="left_allow" width="32px" />
      戻る
    </a>
    <div class="content">
      <div class="heading">
        <HeadingLv1 heading="Setting" />
        <div class="article-list-wrapper">
          <div class="header">
            <p>ID</p>
            <p>タイトル</p>
            <p>作成日時</p>
            <p>更新日時</p>
            <p>公開状態</p>
            <p></p>
          </div>
          <div class="list">
            <template
              v-for="{
                id,
                title,
                created_at,
                updated_at,
                is_publish,
              } in articles"
            >
              <div class="row">
                <div>{{ id }}</div>
                <div>{{ title }}</div>
                <div>
                  {{ parseDate(created_at, DATE_FORMAT_PATTERN) }}
                </div>
                <div>
                  {{ parseDate(updated_at, DATE_FORMAT_PATTERN) }}
                </div>
                <div>{{ is_publish ? '公開済' : '非公開' }}</div>
                <div>
                  <button type="button">編集</button>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Icon from '../Icon.vue';
import HeadingLv1 from '../common/HeadingLv1.vue';
import parseDate from '../../lib/parseDate';

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
    const DATE_FORMAT_PATTERN = 'yyyy年M月d日 hh:mm';
    return { parseDate, DATE_FORMAT_PATTERN };
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

  .article-list-wrapper {
    margin-top: var(--margin-xl);

    > .header,
    > .list > .row {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
    }

    > .header {
      padding: 0 var(--margin-xxs);
      font-size: 1.2rem;
      font-weight: 600;
    }

    > .list {
      display: grid;
      row-gap: var(--margin-xxs);
      margin-top: var(--margin-xxs);
      font-size: 1.4rem;
      font-weight: 600;
    }

    > .list > .row {
      padding: var(--margin-xxs);
      background-color: var(--gray-100);
      border: solid 1px var(--gray-400);
      border-radius: var(--border-radius-xxs);
    }
  }
}
</style>
