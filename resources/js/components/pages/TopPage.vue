<template>
    <div class="top-page-wrapper">
        <div class="contents">
            <HeadingLv1 :heading="heading" />
            {{articles}}
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
    </div>
</template>

<script>
import ArticleCard from "../common/ArticleCard.vue";
import HeadingLv1 from "../common/HeadingLv1.vue";

/** トップページ */
export default {
    name: "TopPage",
    components: {
        HeadingLv1,
        ArticleCard,
    },
    props: {
        heading: {
            type: String,
            default: "Tech Articles",
        },
        articles: {
            type: Array,
            default: () => [],
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

    > .contents {
        width: var(--width-pc);
        margin-top: var(--margin-xl);
    }

    > .contents > .articles {
        padding: var(--margin-xl) 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--margin-s);
    }
}
</style>
