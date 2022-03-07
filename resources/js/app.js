require("./bootstrap");

import { createApp } from "vue";
import bladeComponents from "./bladeComponents";
import SvgVue from "svg-vue3";
import VueMarkdown from "vue3-markdown-it";
import "highlight.js/styles/github-dark-dimmed.css";

createApp({
    components: {
        ...bladeComponents,
    },
})
    .use(SvgVue)
    .use(VueMarkdown)
    .mount("#app");
