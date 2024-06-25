import $ from "jQuery";
import Utility from './utility';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { ScrollToPlugin } from "gsap/ScrollToPlugin"

import Swiper, { Navigation, Pagination, Autoplay, Scrollbar, EffectFade } from 'swiper';
import 'swiper/css/bundle'
Swiper.use([Navigation, Pagination, Autoplay, Scrollbar, EffectFade]);

export default class Page {
    constructor() {
        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
    }

}
