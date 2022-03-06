<template>
    <div class="main-visual-wrapper">
        <div class="content">
            <h1 class="heading">{{ heading }}</h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainVisual",
    props: {
        heading: {
            type: String,
            required: true,
        },
    },
};
</script>

<style lang="scss" scoped>
.main-visual-wrapper {
    width: 100%;
    height: var(--main-visual-height);
    background-color: var(--white);
    padding-bottom: var(--margin-xs);
    display: flex;
    justify-content: center;
    align-items: flex-end;

    > .content {
        width: var(--width-pc);
    }

    > .content > .heading {
        font-size: 2.8rem;
        color: var(--dark-gray);
    }
}
</style>
