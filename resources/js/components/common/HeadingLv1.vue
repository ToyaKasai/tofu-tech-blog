<template>
  <div class="heading-lv1-wrapper">
    <h1 class="heading">{{ heading }}</h1>
  </div>
</template>

<script>
export default {
  name: 'HeadingLv1',
  props: {
    heading: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
.heading-lv1-wrapper {
  width: 100%;
  border-bottom: 1px solid var(--gray-500);

  > .heading {
    font-size: 2.8rem;
    font-weight: 500;
    margin-bottom: var(--margin-xxs);
  }
}
</style>
