<template>
  <div class="blog-form-page-wrapper">
    <button class="link" @click="handleClickLink">
      <Icon name="left_allow" width="32px" />
      戻る
    </button>
    <div class="contents">
      <form
        :action="actionPath"
        method="POST"
        enctype="multipart/form-data"
        class="form"
      >
        <CsrfToken :csrf="csrf" />
        <FormTitleInput
          name="title"
          :value="state.title"
          @update:title="state.title = $event"
        />
        <MarkdownEditor
          name="source"
          :value="state.source"
          @update:source="state.source = $event"
        />
        <FormTextarea
          name="description"
          :value="state.description"
          @update:textarea="state.description = $event"
        />
        <FormImageUploader
          name="thumbnail_path"
          :value="state.image"
          @update:image="updateImage"
        />
        <div class="form-footer">
          <SwitchToggleButton
            name="is_publish"
            :value="state.isPublish"
            label="公開する"
            @toggle="toggleIsPublish"
          />
          <CommonButton type="submit">{{ buttonText }}</CommonButton>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { computed, onBeforeMount, reactive } from 'vue';
import HeadingLv1 from '../common/HeadingLv1.vue';
import FormTitleInput from '../common/form/FormTitleInput.vue';
import FormImageUploader from '../common/form/FormImageUploader.vue';
import FormTextarea from '../common/form/FormTextarea.vue';
import MarkdownEditor from '../common/form/MarkdownEditor.vue';
import CommonButton from '../common/CommonButton.vue';
import SwitchToggleButton from '../common/SwitchToggleButton.vue';
import CsrfToken from '../common/form/CsrfToken.vue';
import Icon from '../Icon.vue';

export default {
  name: 'BlogFormPage',
  components: {
    HeadingLv1,
    FormTitleInput,
    FormImageUploader,
    FormTextarea,
    MarkdownEditor,
    CommonButton,
    SwitchToggleButton,
    CsrfToken,
    Icon,
  },
  props: {
    csrf: {
      type: String,
      required: true,
    },
    actionPath: {
      type: String,
      required: true,
    },
    defaultValues: {
      type: Object,
      default: () => ({}),
    },
    mode: {
      type: String,
      default: 'register',
    },
  },
  setup(props) {
    const state = reactive({
      title: null,
      description: null,
      image: null,
      source: '',
      isPublish: false,
    });

    onBeforeMount(() => {
      if (props.mode !== 'edit') {
        return;
      }

      state.title = props.defaultValues?.title;
      state.description = props.defaultValues?.description;
      state.image = props.defaultValues?.thumbnail_path;
      state.source = props.defaultValues?.source;
      state.isPublish = props.defaultValues?.is_publish;
    });

    const updateImage = (value) => {
      state.image = value;
    };

    const toggleIsPublish = (value) => {
      state.isPublish = value;
    };

    const buttonText = computed(() =>
      props.mode === 'register' ? '保存する' : '更新する',
    );

    const handleClickLink = () => {
      history.back();
    };

    return {
      state,
      updateImage,
      toggleIsPublish,
      buttonText,
      handleClickLink,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../sass/_mixins.scss';

.blog-form-page-wrapper {
  background-color: var(--yellow);
  display: flex;
  flex-direction: column;
  align-items: center;

  @include mq('tablet') {
    padding: var(--margin-s);
  }

  @include mq('sp') {
    padding: var(--margin-xs);
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

    @include mq('tablet') {
      width: 100%;
    }
  }

  > .contents {
    width: var(--width-pc);
    margin-top: var(--margin-xl);

    @include mq('tablet') {
      width: 100%;
    }
  }

  > .contents > .form {
    width: 100%;
    padding-top: var(--margin-xl);
    display: flex;
    flex-direction: column;
    row-gap: var(--margin-s);
  }
}

.form-footer {
  position: sticky;
  bottom: var(--margin-xs);
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  column-gap: var(--margin-s);
  padding: var(--margin-xs);
  margin-bottom: var(--margin-xs);
  box-sizing: border-box;
  background-color: var(--base-bg-color);
  border-radius: var(--border-radius-s);

  @include np-shadow;
}
</style>
