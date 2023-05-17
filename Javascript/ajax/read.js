const isElementInViewport = (div) => {
    var rect = div.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /* or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
    );
}

setInterval(() => {
    let xhr = new XMLHttpRequest;

    if(isElementInViewport()) {}
}, 500);