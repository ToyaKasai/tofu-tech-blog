<template>
  <input type="hidden" name="_token" :value="csrf" />
</template>

<script>
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
