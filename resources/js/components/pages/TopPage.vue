<template>
  <div class="top-page-wrapper">
    <div class="contents">
      <HeadingLv1 :heading="heading" />
      <section class="articles">
        <template v-for="article in articles" :key="article.id">
          <!-- TODO: 公開記事のみ表示するようにする -->
          <ArticleCard
            :id="article.id"
            :isSave="article.is_save"
            :thumbnailPath="article.thumbnail_path"
            :title="article.title"
            :description="article.description"
            :date="article.updated_at"
          />
        </template>
      </section>
      <div class="button">
        <CommonButton href="/list" :is-full="true" :text-gray="true"
          >もっと見る
        </CommonButton>
      </div>
    </div>
  </div>
</template>

<script>
import HeadingLv1 from '../common/HeadingLv1.vue';
import ArticleCard from '../common/ArticleCard.vue';
import CommonButton from '../common/CommonButton.vue';

/** トップページ */
export default {
  name: 'TopPage',
  components: {
    HeadingLv1,
    ArticleCard,
    CommonButton,
  },
  props: {
    heading: {
      type: String,
      default: 'Tech Articles',
    },
    articles: {
      type: Array,
      default: () => [],
    },
  },
};
</script>

<style lang="scss" scoped>
.top-page-wrapper {
  background-color: var(--yellow);
  display: flex;
  flex-direction: column;
  align-items: center;

  > .contents {
    width: var(--width-pc);
    margin-top: var(--margin-xl);
  }

  > .contents > .articles {
    padding-top: var(--margin-xl);
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--margin-s);
  }

  > .contents > .button {
    margin: var(--margin-m) 0 var(--margin-xl) 0;
    width: 100%;
  }
}
</style>
