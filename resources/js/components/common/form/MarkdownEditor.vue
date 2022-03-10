<template>
  <div class="markdown-editor-wrapper">
    <!-- editor or preview -->
    <div class="tabs">
      <button
        type="button"
        class="tab"
        :class="{ '-active': mode === 'edit' }"
        @click="setEditMode"
      >
        <Icon name="write" width="20px" />
        Editor
      </button>
      <button
        type="button"
        class="tab"
        :class="{ '-active': mode === 'preview' }"
        @click="setPreviewMode"
      >
        <Icon name="eye" width="20px" />
        Preview
      </button>
    </div>

    <!-- editor -->
    <div class="content">
      <template v-if="mode === 'edit'">
        <textarea
          class="editor"
          :name="name"
          :placeholder="placeholder"
          v-model="input"
        >
        </textarea>
      </template>
      <template v-if="mode === 'preview'">
        <template v-if="!value">
          <p class="default">{{ NOT_SOURCE_TEXT }}</p>
        </template>
        <template v-else>
          <VueMarkdown
            :breaks="true"
            :html="true"
            :linkify="true"
            class="markdown-preview"
            :source="value"
          />
        </template>
      </template>
    </div>
  </div>
</template>

<script>
  import { computed, ref } from 'vue';
  import VueMarkdown from 'vue3-markdown-it';
  import Icon from '../../Icon.vue';

  /** マークダウンエディタ */
  export default {
    name: 'MarkdownEditor',
    components: {
      VueMarkdown,
      Icon,
    },
    props: {
      name: {
        type: String,
        required: true,
      },
      placeholder: {
        type: String,
        default: 'Enter in Markdown',
      },
      value: {
        type: String,
        default: '',
      },
    },
    setup(props, { emit }) {
      const mode = ref('edit');

      const NOT_SOURCE_TEXT = 'Not Contents';

      const setEditMode = () => {
        mode.value = 'edit';
      };

      const setPreviewMode = () => {
        mode.value = 'preview';
      };

      const input = computed({
        get: () => props.value,
        set: (value) => {
          emit('update:source', value);
        },
      });

      return {
        mode,
        NOT_SOURCE_TEXT,
        setEditMode,
        setPreviewMode,
        input,
      };
    },
  };
</script>

<style lang="scss" scoped>
  @import '../../../../sass/_mixins.scss';
  @import '../../../../sass/markdownPreview.scss';

  .markdown-editor-wrapper {
    width: 100%;
    background-color: var(--base-bg-color);
    border: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-s);
    padding: var(--margin-s);
    box-sizing: border-box;
    height: 780px;

    @include np-shadow;

    &:focus-within {
      @include np-inner-shadow;
    }

    > .tabs {
      display: flex;
      column-gap: var(--margin-xxs);
      margin-bottom: var(--margin-s);
    }

    > .tabs > .tab {
      display: flex;
      align-items: center;
      justify-content: center;
      column-gap: var(--margin-xxs);
      width: 140px;
      font-size: 1.4rem;
      font-weight: bold;
      color: var(--base-text-color);
      background-color: var(--base-bg-color);
      outline: 1px solid var(--base-border-color);
      border-radius: var(--border-radius-xs);
      padding: 8px 0;

      @include np-shadow;

      &:hover {
        cursor: pointer;
      }

      &.-active {
        @include np-inner-shadow;
      }
    }

    > .content {
      height: 620px;
      overflow-y: auto;
    }

    > .content > .editor {
      width: 100%;
      height: 100%;
      font-size: 1.6rem;
      font-family: inherit;
      line-height: 1.4;
      color: var(--base-text-color);
      background-color: var(--base-bg-color);
      outline: none;
      border: none;
    }

    > .content > .default {
      text-align: center;
      font-size: 2rem;
      color: var(--gray-600);
    }
  }
</style>
