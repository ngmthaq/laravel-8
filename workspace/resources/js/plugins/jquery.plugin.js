import $ from "jquery";

$.fn.startButtonLoading = function (
    start = true,
    text = "Loading",
    withModal = true
) {
    const loading = `<span class="spinner-grow spinner-grow-sm"></span>
    <span class="d-inline-block ms-1">${text}</span>`;

    if (start) {
        this.attr("data-original-html", this.html().trim());
        this.attr("disabled", true);
        this.html(loading.trim());
        if (withModal) {
            $(".transparent-modal").show();
        }
    } else {
        this.html(this.data("original-html"));
        this.attr("disabled", false);
        this.removeAttr("data-original-html");
        $(".transparent-modal").hide();
    }
};

export { $ };
