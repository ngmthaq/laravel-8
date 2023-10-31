import { bootstrap } from "./bootstrap.plugin";

export const openConfirmDialog = ({
    message,
    title = "",
    type = "confirm",
    onAccept = async () => {},
    onDeny = async () => {},
}) => {
    if (type === "confirm") {
        $("#staticBackdrop").find(".modal-footer .btn.deny").show();
    } else if (type === "alert") {
        $("#staticBackdrop").find(".modal-footer .btn.deny").hide();
    } else {
        throw new Error("Invalid type");
    }

    const modal = new bootstrap.Modal("#staticBackdrop", {
        focus: true,
        keyboard: false,
        backdrop: "static",
    });

    $("#staticBackdrop")
        .find(".modal-footer .btn.deny")
        .on("click", async () => {
            await onDeny();
            modal.hide();
        });

    $("#staticBackdrop")
        .find(".modal-footer .btn.accept")
        .on("click", async () => {
            await onAccept();
            modal.hide();
        });

    $("#staticBackdrop").find(".modal-body").text(message);

    if (title) {
        $("#staticBackdrop").find(".modal-title").text(title);
        $("#staticBackdrop").find(".modal-header").show();
    } else {
        $("#staticBackdrop").find(".modal-header").hide();
    }

    modal.show();
};
