import barba from '@barba/core';
import $ from "jQuery";

/*
 * Barba pjax
 * https://barba.js.org/docs/advanced/hooks/
 * demo https://ihatetomatoes.net/demos/barbajs/
 */
export default class Barba {
    constructor() {
        // vars
        const replaceHeadTags = target => {
            const head = document.head;
            const targetHead = target.html.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0];
            const newPageHead = document.createElement('head');
            newPageHead.innerHTML = targetHead;
            const removeHeadTags = [
                "meta[name='keywords']",
                "meta[name='description']",
                "meta[property^='fb']",
                "meta[property^='og']",
                "meta[name^='twitter']",
                "meta[name='robots']",
                'meta[itemprop]',
                'link[itemprop]',
                "link[rel='prev']",
                "link[rel='next']",
                "link[rel='canonical']"
            ].join(',');
            const headTags = [...head.querySelectorAll(removeHeadTags)];
            headTags.forEach(item => {
                head.removeChild(item);
            });
            const newHeadTags = [...newPageHead.querySelectorAll(removeHeadTags)];
            newHeadTags.forEach(item => {
                head.appendChild(item);
            });
        };

        // functions
        barba.init({
            debug: true,
            transitions: [
                {
                    sync: true,
                    beforeOnce: () => {},
                    once: () => {},
                    async before() {
                        document.body.classList.add('is-page-transition');
                        await delay(300);
                    },
                    leave(data) {
                    },
                    afterLeave() {
                    },
                    beforeEnter({current, next}) {
                        replaceHeadTags(next);
                        window.scrollTo(0, 0);
                        document.body.classList.remove('is-page-transition');
                    },
                    enter(data) {
                    },
                    after: () => {},
                }
            ],
            prevent: ({ el }) => el.hasAttribute("data-scroll-anchor")
        });

        // Googleアナリティクスに情報を送る
        barba.hooks.after(() => {
            if(typeof ga === 'function') {
                ga('set', 'page', window.location.pathname);
                ga('send', 'pageview');
            }
        });

        function delay (n) {
            n = n || 2000;
            return new Promise((done) => {
                setTimeout(() => {
                    done();
                }, n);
            });
        }
    }
}
