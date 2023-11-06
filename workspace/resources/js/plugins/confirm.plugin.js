import { bootstrap } from "./bootstrap.plugin";
import { $ } from "./jquery.plugin";

export const openConfirmDialog = ({
    message,
    title = "",
    type = "confirm",
    onAccept = async () => {},
    onDeny = async () => {},
}) => {
    if (type === "confirm") {
        $("#static-backdrop").find(".modal-footer .btn.deny").show();
    } else if (type === "alert") {
        $("#static-backdrop").find(".modal-footer .btn.deny").hide();
    } else {
        throw new Error("Invalid type");
    }

    const modal = new bootstrap.Modal("#static-backdrop", {
        focus: true,
        keyboard: false,
        backdrop: "static",
    });

    $("#static-backdrop")
        .find(".modal-footer .btn.deny")
        .on("click", async () => {
            await onDeny();
            modal.hide();
        });

    $("#static-backdrop")
        .find(".modal-footer .btn.accept")
        .on("click", async () => {
            await onAccept();
            modal.hide();
        });

    $("#static-backdrop").find(".custom-modal-message").text(message);

    if (title) {
        $("#static-backdrop").find(".custom-modal-title").text(title);
        $("#static-backdrop").find(".custom-modal-title").show();
    } else {
        $("#static-backdrop").find(".custom-modal-title").hide();
    }

    modal.show();
};
