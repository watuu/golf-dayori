import { loadDefaultJapaneseParser } from 'budoux';
// import barba from "@barba/core";
const parser = loadDefaultJapaneseParser();

export default class BudouX {
    constructor() {

        this.load();
        // barba.hooks.beforeOnce((data) => {
        //     this.load();
        // })
        // barba.hooks.after((data) => {
        //     this.load();
        // });
    }

    load() {
        const elms = document.querySelectorAll('[data-budoux]');
        if (elms.length) {
            for (let elm of elms) {
                parser.applyElement(elm);
            }
        }
    }

}
