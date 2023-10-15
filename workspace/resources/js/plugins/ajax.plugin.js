import $ from "jquery";

export class Ajax {
    $ = $;
    csrfToken = "";
    beforeSend = (xhr) => {};
    completed = (xhr, status) => {};

    constructor() {
        this.csrfToken = $(`meta[name="X-CSRF-TOKEN"]`).attr("content") || "";
    }

    onBeforeSend(callback) {
        this.beforeSend = callback;
    }

    onCompleted(callback) {
        this.completed = callback;
    }

    get({ url, data = {}, configs = {} }) {
        return new Promise((resolve) => {
            $.ajax({
                url: url,
                data: data,
                type: "GET",
                beforeSend: (xhr) => {
                    this.beforeSend(xhr);
                },
                complete: (xhr, status) => {
                    this.completed(xhr, status);
                },
                success: (result, status, xhr) => {
                    resolve({
                        data: result,
                        statusText: status,
                        status: xhr.status,
                        xhr: xhr,
                    });
                },
                error: (xhr, status) => {
                    resolve({
                        errorText: xhr.responseText || null,
                        errorJson: xhr.responseJSON || null,
                        errorXml: xhr.responseXML || null,
                        statusText: status,
                        status: xhr.status,
                        xhr: xhr,
                    });
                },
                ...configs,
            });
        });
    }

    fetch(url, formData, method, configs) {
        return new Promise((resolve) => {
            $.ajax({
                url: url,
                data: formData,
                type: method,
                processData: false,
                contentType: false,
                beforeSend: (xhr) => {
                    xhr.setRequestHeader("X-CSRF-TOKEN", this.csrfToken);
                    this.beforeSend(xhr);
                },
                complete: (xhr, status) => {
                    this.completed(xhr, status);
                },
                success: (result, status, xhr) => {
                    resolve({
                        data: result,
                        statusText: status,
                        status: xhr.status,
                        xhr: xhr,
                    });
                },
                error: (xhr, status) => {
                    resolve({
                        errorText: xhr.responseText || null,
                        errorJson: xhr.responseJSON || null,
                        errorXml: xhr.responseXML || null,
                        statusText: status,
                        status: xhr.status,
                        xhr: xhr,
                    });
                },
                ...configs,
            });
        });
    }

    post({ url, data = {}, configs = {} }) {
        let formData = null;
        if (typeof data === "object" && !Array.isArray(data)) {
            formData = new FormData();
            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const value = data[key];
                    formData.append(key, value);
                }
            }
        } else {
            formData = data;
        }

        return this.fetch(url, formData, "POST", configs);
    }

    put({ url, data = {}, configs = {} }) {
        let formData = null;
        if (typeof data === "object" && !Array.isArray(data)) {
            formData = new FormData();
            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const value = data[key];
                    formData.append(key, value);
                }
            }
        } else {
            formData = data;
        }

        formData.append("_method", "PUT");

        return this.fetch(url, formData, "POST", configs);
    }

    patch({ url, data = {}, configs = {} }) {
        let formData = null;
        if (typeof data === "object" && !Array.isArray(data)) {
            formData = new FormData();
            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const value = data[key];
                    formData.append(key, value);
                }
            }
        } else {
            formData = data;
        }

        formData.append("_method", "PATCH");

        return this.fetch(url, formData, "POST", configs);
    }

    delete({ url, data = {}, configs = {} }) {
        let formData = null;
        if (typeof data === "object" && !Array.isArray(data)) {
            formData = new FormData();
            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const value = data[key];
                    formData.append(key, value);
                }
            }
        } else {
            formData = data;
        }

        formData.append("_method", "DELETE");

        return this.fetch(url, formData, "POST", configs);
    }
}
