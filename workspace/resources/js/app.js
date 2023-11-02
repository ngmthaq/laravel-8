import { $ } from "./plugins/jquery.plugin";
import { bootstrap } from "./plugins/bootstrap.plugin";
import { __, translateElements } from "./plugins/i18n.plugin";
import { Ajax } from "./plugins/ajax.plugin";
import { appendToast } from "./plugins/toast.plugin";
import { openConfirmDialog } from "./plugins/confirm.plugin";
import { openSpinnerLoading } from "./plugins/loading.plugin";

// Application Runtime Methods
translateElements();

// Window Plugins
window.$ = $;
window.bootstrap = bootstrap;
window.__ = __;
window.Ajax = Ajax;
window.appendToast = appendToast;
window.openConfirmDialog = openConfirmDialog;
window.openSpinnerLoading = openSpinnerLoading;

// Api Services
