window.constants = {
    enabled_legacy_browser: false,
}
import {default as Common} from './common';
// import Barba from './barba';
import Page from './page';
import BudouX from './budoux';

class APP {
    constructor() {
        const common = new Common();
        common.load();
        // new Barba();
        new Page();
        new BudouX();
    }
}

new APP()