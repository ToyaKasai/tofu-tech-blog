<template>
  <div class="view-page-wrapper">
    <a class="link" href="/">
      <Icon name="left_allow" width="32px" />
      TOPへ戻る
    </a>
    <div class="thumbnail">
      <img class="image" alt="" :src="thumbnailSrc" />
    </div>
    <div class="content">
      <p class="title">{{ article.title }}</p>
      <div class="date">
        <div class="create">
          <Icon name="write" />
          {{ createDate }}
        </div>
        <div class="update">
          <Icon name="update" />
          {{ updateDate }}
        </div>
      </div>
      <div class="article-content">
        <div class="side">
          <div class="content">
            <button
              class="action-button"
              @click="updateFavorite"
              :disabled="isSaving"
            >
              <template v-if="isSave">
                <Icon class="heart" name="heart" />
              </template>
              <template v-else>
                <Icon name="heart_outline" />
              </template>
            </button>
            <a :href="editPath" class="action-button">
              <Icon name="write" />
            </a>
            <form :action="deletePath" method="POST" @submit="handleSubmit">
              <CsrfToken :csrf="csrf" />
              <button type="submit" class="action-button">
                <Icon class="delete" name="trash" />
              </button>
            </form>
          </div>
        </div>
        <MarkdownPreview :value="article.source" />
      </div>
    </div>
  </div>
</template>

<script>
import { computed, ref } from 'vue';
import {
  STORAGE_IMAGE_PATH,
  DEFAULT_THUMBNAIL_PATH,
} from '../../lib/storageImage';
import Icon from '../Icon.vue';
import MarkdownPreview from '../common/MarkdownPreview.vue';
import parseArticlePath from '../../lib/parseArticlePath';
import parseDate from '../../lib/parseDate';
import CsrfToken from '../common/form/CsrfToken.vue';
import axios from 'axios';

export default {
  name: 'ViewPage',
  components: {
    Icon,
    MarkdownPreview,
    CsrfToken,
  },
  props: {
    article: {
      type: Object,
      default: () => ({}),
    },
    csrf: {
      type: String,
      required: true,
    },
    deletePath: {
      type: String,
      required: true,
    },
    updateFavoriteUrl: {
      type: String,
      required: true,
    },
  },
  setup(props) {
    const isSave = ref(props.article.is_save);
    const isSaving = ref(false);

    const thumbnailSrc = computed(() =>
      props.article.thumbnail_path
        ? `${STORAGE_IMAGE_PATH}${props.article.thumbnail_path}`
        : DEFAULT_THUMBNAIL_PATH,
    );

    const createDate = computed(() =>
      parseDate(props.article.created_at, 'yyyy年M月d日 HH:mm'),
    );

    const updateDate = computed(() =>
      parseDate(props.article.updated_at, 'yyyy年M月d日 HH:mm'),
    );

    const editPath = computed(() => parseArticlePath(props.article.id).edit);

    const handleSubmit = (e) => {
      if (!window.confirm('本当に削除しますか？')) {
        e.preventDefault();
      }
    };

    const updateFavorite = async () => {
      isSaving.value = true;
      try {
        const result = await axios.post(props.updateFavoriteUrl);
        if (result.data === 1) {
          isSave.value = !isSave.value;
        }
      } catch (e) {
        console.error(
          `お気に入り更新処理に失敗しました。エラーメッセージ：${e}`,
        );
      }
      isSaving.value = false;
    };

    return {
      isSave,
      thumbnailSrc,
      createDate,
      updateDate,
      editPath,
      handleSubmit,
      updateFavorite,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.view-page-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  @include mq('tablet') {
    padding: 0 var(--margin-s);
  }

  @include mq('sp') {
    padding: 0 var(--margin-xs);
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
      margin-left: var(--margin-s);
    }

    @include mq('sp') {
      width: 100%;
      margin-left: var(--margin-xs);
    }
  }

  > .thumbnail {
    height: 180px;
    padding: var(--margin-m);
    text-align: center;
  }

  > .thumbnail > .image {
    height: 100%;
  }

  > .content {
    width: var(--width-pc);

    @include mq('tablet') {
      width: 100%;
    }
  }

  > .content > .date {
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: var(--margin-xs);
  }

  > .content > .date > .create,
  > .content > .date > .update {
    display: flex;
    align-items: center;
    column-gap: 8px;
    font-size: 1.4rem;
    color: var(--gray-600);
    margin-top: var(--margin-xxs);
  }

  > .content > .title {
    font-size: 2.8rem;
    font-weight: bold;
    text-align: center;
  }
}

.article-content {
  display: grid;
  grid-template-columns: auto 1fr;
  column-gap: var(--margin-m);
  padding: var(--margin-xl) 0;

  @include mq('sp') {
    grid-template-columns: 1fr;
    row-gap: var(--margin-xs);
  }

  > .side > .content {
    position: sticky;
    top: var(--margin-l);
    display: flex;
    flex-direction: column;
    row-gap: var(--margin-xs);

    @include mq('sp') {
      position: inherit;
      flex-direction: row;
      column-gap: var(--margin-xxs);
    }
  }
}

.action-button {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  color: var(--base-text-color);
  background-color: var(--base-bg-color);
  outline: 1px solid var(--base-border-color);
  border-radius: var(--border-radius-circle);

  @include np-shadow(3px, 6px);

  &:hover {
    @include np-inner-shadow(3px, 6px);
  }

  > .heart {
    color: var(--red);
  }

  > .delete {
    color: var(--alert);
  }
}
</style>
