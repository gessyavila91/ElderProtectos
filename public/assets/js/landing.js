document.oncontextmenu = function () {
    return false
}

function disableSelect() {
    return false
}

function reEnable() {
    return true
}

document.onselectstart = new Function("return false")

window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}

gtag('js', new Date());

gtag('config', 'UA-106759176-1');
