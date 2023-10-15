import "bootstrap/dist/js/bootstrap";
import "bootstrap-icons/font/bootstrap-icons.scss";

import $ from "jquery";
import { __ } from "./plugins/i18n.plugin";
import { Ajax } from "./plugins/ajax.plugin";

// Plugins
window.$ = $;
window.__ = __;
window.Ajax = Ajax;

// Api
