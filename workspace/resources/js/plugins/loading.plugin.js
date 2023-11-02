import { $ } from "./jquery.plugin";

export const openSpinnerLoading = (open = true) => {
    if (open) {
        $(".spinner-loading").fadeIn("fast");
    } else {
        $(".spinner-loading").fadeOut("fast");
    }
};
