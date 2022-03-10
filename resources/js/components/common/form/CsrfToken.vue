<template>
  <input type="hidden" name="_token" :value="csrf" />
</template>

<script>
// csrf token埋め込み用コンポーネント
export default {
  name: 'CsrfToken',
  props: {
    csrf: {
      type: String,
      required: true,
    },
  },
};
</script>
