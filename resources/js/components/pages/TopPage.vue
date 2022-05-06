<template>
  <div class="top-page-wrapper">
    <div class="contents">
      <HeadingLv1 :heading="heading" />
      <section class="articles">
        <template v-for="article in displayArticles" :key="article.id">
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
        <template v-if="ArticlesToArray.length !== displayArticles.length">
          <CommonButton
            :is-full="true"
            :text-gray="true"
            @click="incrementArticles"
            >もっと見る
          </CommonButton>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import HeadingLv1 from '../common/HeadingLv1.vue';
import ArticleCard from '../common/ArticleCard.vue';
import CommonButton from '../common/CommonButton.vue';
import { computed, ref } from 'vue';

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
      type: Object,
      default: () => ({}),
    },
  },
  setup(props) {
    const NUMBER_OF_ARTICLES = 9;

    const currentNumOfArticles = ref(NUMBER_OF_ARTICLES);

    /** bladeからオブジェクトで来るので配列化 */
    const ArticlesToArray = computed(() =>
      Object.keys({ ...props.articles }).map((key) => ({
        ...props.articles[key],
      })),
    );

    const displayArticles = computed(() =>
      [...ArticlesToArray.value].splice(0, currentNumOfArticles.value),
    );

    const incrementArticles = () => {
      currentNumOfArticles.value += NUMBER_OF_ARTICLES;
    };

    return {
      ArticlesToArray,
      displayArticles,
      incrementArticles,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.top-page-wrapper {
  background-color: var(--yellow);
  display: flex;
  flex-direction: column;
  align-items: center;

  @include mq('sp') {
    padding: 0 var(--margin-xs);
  }

  @include mq('tablet') {
    padding: 0 var(--margin-s);
  }

  > .contents {
    width: var(--width-pc);
    margin-top: var(--margin-xl);

    @include mq('tablet') {
      width: 100%;
    }

    @include mq('sp') {
      width: 100%;
    }
  }

  > .contents > .articles {
    padding-top: var(--margin-xl);
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--margin-s);

    @include mq('tablet') {
      grid-template-columns: repeat(2, 1fr);
    }

    @include mq('sp') {
      grid-template-columns: 1fr;
    }
  }

  > .contents > .button {
    margin: var(--margin-s) 0 var(--margin-xl) 0;
    width: 100%;
  }
}
</style>
