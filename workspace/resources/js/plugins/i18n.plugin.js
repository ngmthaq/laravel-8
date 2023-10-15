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
