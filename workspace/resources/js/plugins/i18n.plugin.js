import $ from "jquery";

export const __ = (key, replace = {}) => {
    let translation = key
        .split(".")
        .reduce(
            (translationObj, currentKey) => translationObj[currentKey] || key,
            window.translation
        );

    if (translation === key) {
        translation = window.translationJson[key] || key;
    }

    for (let placeholder in replace) {
        translation = translation.replace(
            `:${placeholder}`,
            replace[placeholder]
        );
    }

    return translation;
};

export const translateElements = () => {
    $("[data-i18n]").each(function () {
        $(this).text(__($(this).data("i18n")));
    });
};
