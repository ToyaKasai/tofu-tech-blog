require("./bootstrap");

import { createApp } from "vue";
import bladeComponents from "./BladeComponents";

createApp({
    components: {
        ...bladeComponents,
    },
}).mount("#app");
