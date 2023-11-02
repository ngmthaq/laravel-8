import { bootstrap } from "./bootstrap.plugin";
import { $ } from "./jquery.plugin";

export class Toasts {
    template = `
        <div class="toast mt-1 me-1 mb-1 text-bg-{{ variant }}" id="toast-{{ id }}" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                {{ message }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>`;

    constructor(message, variant = "success") {
        const id = Math.random().toString(36).slice(2);

        this.template = this.template
            .replace("{{ variant }}", variant)
            .replace("{{ message }}", message)
            .replace("{{ id }}", id);

        $("#toast-stack").append(this.template);

        const toastId = "toast-" + id;

        const toast = new bootstrap.Toast($("#" + toastId).get(0), {
            animation: true,
            autohide: true,
            delay: 10000,
        });

        $("#" + toastId)
            .get(0)
            .addEventListener("hidden.bs.toast", function () {
                this.remove();
            });

        toast.show();
    }
}

export const appendToast = (message, variant = "success") => {
    new Toasts(message, variant);
};
