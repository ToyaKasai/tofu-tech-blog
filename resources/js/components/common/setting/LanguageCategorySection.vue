<template>
  <div class="pickup-section-wrapper">
    <Accordion
      :is-open="isOpen"
      title="カテゴリを設定する"
      @toggle="toggleIsOpen"
    >
      <div class="category-content">
        <div class="categories">
          <img href="" alt="" class="icon" />
          <p class="title"></p>
        </div>
      </div>
    </Accordion>
  </div>
</template>

<script>
import Accordion from '../../common/Accordion.vue';
import CsrfToken from '../../common/form/CsrfToken.vue';
import { ref } from 'vue';

/** カテゴリ設定セクション */
export default {
  name: 'LanguageCategorySection',
  components: {
    CsrfToken,
    Accordion,
  },
  props: {
    csrf: {
      type: String,
      required: true,
    },
    // updateCategoryPath: {
    //   type: String,
    //   required: true,
    // },
    mode: {
      type: String,
      default: '',
    },
  },
  setup(props) {
    const PAGE_SECTION_MODE = 'category';

    const isOpen = ref(props.mode === PAGE_SECTION_MODE);

    const toggleIsOpen = (value) => (isOpen.value = value);

    return {
      PAGE_SECTION_MODE,
      isOpen,
      toggleIsOpen,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../../sass/_mixins.scss';

.category-content {
  padding: var(--margin-s) var(--margin-xxs);

  > .categories {
    display: grid;
    grid-template-columns: auto 1fr;
    column-gap: var(--margin-xs);
    row-gap: var(--margin-s);
  }
}
</style>
