<template>
  <div class="global-footer-wrapper">
    <div class="links">
      <a class="link" :href="GITHUB_LINK" target="_blank">
        <Icon name="github" width="42px" />
      </a>
    </div>
    <div class="copy">©2022 tofu</div>
  </div>
</template>

<script>
import Icon from '../Icon.vue';

export default {
  components: { Icon },
  name: 'GlobalFooter',
  setup() {
    const GITHUB_LINK = 'https://github.com/ToyaKasai';
    return { GITHUB_LINK };
  },
};
</script>

<style lang="scss">
@import '../../../sass/_mixins.scss';

.global-footer-wrapper {
  background-color: var(--base-bg-color);
  height: 240px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  row-gap: var(--margin-m);
  color: var(--base-text-color);
  font-weight: 500;
  font-size: 1.8rem;
  border-top: 1px solid var(--gray-500);
  margin-top: auto;

  > .links > .link {
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--base-text-color);
    background-color: var(--base-bg-color);
    outline: 1px solid var(--base-border-color);
    border-radius: var(--border-radius-circle);

    @include np-shadow(3px, 6px);

    &:hover {
      outline: none;
      @include np-inner-shadow;
      cursor: pointer;
    }
  }
}
</style>
