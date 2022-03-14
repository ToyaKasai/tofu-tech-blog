<template>
  <div class="pickup-section-wrapper">
    <Accordion
      :default-value="mode === PAGE_SECTION_MODE"
      title="カテゴリを設定する"
    >
    </Accordion>
  </div>
</template>

<script>
import Accordion from '../../common/Accordion.vue';
import CsrfToken from '../../common/form/CsrfToken.vue';

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
  setup() {
    const PAGE_SECTION_MODE = 'category';

    return {
      PAGE_SECTION_MODE,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../../sass/_mixins.scss';
</style>
