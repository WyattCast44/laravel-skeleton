import tippy from "tippy.js";
import "tippy.js/dist/tippy.css";
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import persist from "@alpinejs/persist";
import collapse from "@alpinejs/collapse";
import intersect from "@alpinejs/intersect";
import tooltip from "@ryangjchandler/alpine-tooltip";

Alpine.plugin(focus);
Alpine.plugin(persist);
Alpine.plugin(tooltip);
Alpine.plugin(collapse);
Alpine.plugin(intersect);

window.Alpine = Alpine;

Alpine.start();
