<template>
  <div class="form-image-uploader-wrapper">
    <div class="uploader">
      <div class="content">
        <div class="icon">
          <Icon name="thumbnail" width="64px" />
        </div>
        <template v-if="value">
          <div class="image">
            <Icon name="image" />
            {{ value }}
          </div>
        </template>
        <template v-else>
          <p class="text">{{ DEFAULT_UPLOADER_TEXT }}</p>
        </template>
      </div>
      <CommonButton class="button">
        <input
          class="input"
          type="file"
          :name="name"
          :accept="FILE_ACCEPT_EXTENSIONS"
          @change="handleUploadImage"
        />
        Upload Thumbnail
      </CommonButton>
    </div>
  </div>
</template>

<script>
import Icon from '../../Icon.vue';
import CommonButton from '../CommonButton.vue';

/** 画像アップローダー */
export default {
  components: {
    CommonButton,
    Icon,
  },
  name: 'FormImageUploader',
  props: {
    name: {
      type: String,
      required: true,
    },
    value: {
      type: String,
      required: true,
    },
  },
  setup(_, { emit }) {
    const FILE_ACCEPT_EXTENSIONS = ['.jpeg', '.jpg', '.png'];
    const DEFAULT_UPLOADER_TEXT = 'Please Upload Thumbnail File!';

    const handleUploadImage = (e) => {
      emit('update:image', e.target.files[0].name);
    };

    return {
      FILE_ACCEPT_EXTENSIONS,
      DEFAULT_UPLOADER_TEXT,
      handleUploadImage,
    };
  },
};
</script>

<style lang="scss" scoped>
@import '../../../../sass/_mixins.scss';

.form-image-uploader-wrapper {
  display: flex;
  justify-content: center;
  background-color: var(--base-bg-color);
  padding: var(--margin-m);
  border: 1px solid var(--base-border-color);
  border-radius: var(--border-radius-s);

  @include np-shadow;

  > .uploader {
    display: flex;
    align-items: center;
    flex-direction: column;
    width: 100%;
    height: 100%;
    border: 2px dotted var(--gray-500);
    border-radius: var(--border-radius-s);
    padding: var(--margin-s);
  }

  > .uploader > .content {
    display: flex;
    flex-direction: column;
    row-gap: var(--margin-xs);
    padding: var(--margin-m);
    text-align: center;
    color: var(--base-text-color);

    @include mq('sp') {
      padding: var(--margin-xs) 0;
    }
  }

  > .uploader > .content > .image {
    padding: 8px var(--margin-s);
    border-radius: 25px;
    background-color: var(--gray-600);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--margin-xxs);
    color: var(--white);
    font-size: 1.2rem;
    font-weight: 600;
  }

  > .uploader > .content > .text {
    font-size: 1.4rem;
    font-weight: bold;
  }

  > .uploader > .button {
    position: relative;
  }

  > .uploader > .button > .input {
    opacity: 0;
    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;

    &::-webkit-file-upload-button {
      cursor: pointer;
    }
  }
}
</style>
