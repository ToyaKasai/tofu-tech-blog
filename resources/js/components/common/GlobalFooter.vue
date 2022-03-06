<template>
    <div class="global-footer-wrapper">
        <div class="copy">© tofu</div>
    </div>
</template>

<script>
export default {
    name: "GlobalFooter",
};
</script>

<style lang="scss">
.global-footer-wrapper {
    background-color: var(--dark-gray);
    height: 240px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-weight: 600;
    font-size: 2rem;
}
</style>
