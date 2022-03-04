require("./bootstrap");

import { createApp } from "vue";
import bladeComponents from "./bladeComponents";
import SvgVue from "svg-vue3";

createApp({
    components: {
        ...bladeComponents,
    },
})
    .use(SvgVue)
    .mount("#app");
