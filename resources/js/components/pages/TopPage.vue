<template>
    <div class="top-page-wrapper">
        <MainVisual :heading="heading" />
        <section class="articles">
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
            <ArticleCard
                title="タイトル"
                description="説明文"
                date="2022.03.04"
            />
        </section>
    </div>
</template>

<script>
import ArticleCard from "../common/ArticleCard.vue";
import MainVisual from "../common/MainVisual.vue";

/** トップページ */
export default {
    name: "TopPage",
    components: {
        MainVisual,
        ArticleCard,
    },
    props: {
        heading: {
            type: String,
            default: "Tech Articles",
        },
    },
};
</script>

<style lang="scss" scoped>
.top-page-wrapper {
    background-color: var(--yellow);
    display: flex;
    flex-direction: column;
    align-items: center;

    > .articles {
        width: var(--width-pc);
        padding: var(--margin-xl) 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--margin-s);
    }
}
</style>
