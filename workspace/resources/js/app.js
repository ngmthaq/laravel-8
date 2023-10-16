import $ from "jquery";
import { bootstrap } from "./plugins/bootstrap.plugin";
import { __ } from "./plugins/i18n.plugin";
import { Ajax } from "./plugins/ajax.plugin";
import { appendToast } from "./plugins/toast.plugin";

// Plugins
window.$ = $;
window.bootstrap = bootstrap;
window.__ = __;
window.Ajax = Ajax;
window.appendToast = appendToast;

// Api
