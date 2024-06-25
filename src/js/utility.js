
/*
 * utility
 * 共通変数と関数
 */
export default class Utility {

    constructor() {

    }

    static isSP() {
        return window.matchMedia('screen and (min-width: 320px) and (max-width: 749px)').matches
    }
    static isTAB() {
        return window.matchMedia('screen and (min-width: 750px) and (max-width: 1023px)').matches
    }
    static isPC() {
        return window.matchMedia('screen and (min-width: 1024px)').matches
    }

    static convertSpiltSpan(selector) {
        // vars
        const target = convertElement(selector)
        const nodes = [...target.childNodes];
        let spanWrapText = ""

        // functions
        nodes.forEach((node) => {
            if (node.nodeType == 3) { //テキストの場合
                const text = node.textContent.replace(/\r?\n/g, '');
                spanWrapText = spanWrapText + text.split('').reduce((acc, v) => {
                    v = v != ' '? v: '&nbsp'
                    return acc + `<span>${v}</span>`
                }, "");
            } else {
                spanWrapText = spanWrapText + node.outerHTML
            }
        })
        target.innerHTML = spanWrapText

        function convertElement(element) {
            if (element instanceof HTMLElement) {
                return element
            }
            return document.querySelector(element);
        }
    }
}

