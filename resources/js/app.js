require("./bootstrap");

import { createApp } from "vue";
import bladeComponents from "./bladeComponents";

createApp({
    components: {
        ...bladeComponents,
    },
}).mount("#app");
