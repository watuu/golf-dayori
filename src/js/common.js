// import barba from '@barba/core';
import $ from "jQuery";
import Utility from './utility';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger'

import 'overlayscrollbars/overlayscrollbars.css';
import {
    OverlayScrollbars,
    // ScrollbarsHidingPlugin,
    // SizeObserverPlugin,
    // ClickScrollPlugin
} from 'overlayscrollbars';

/*
 * common
 * 共通変数と関数
 */
export default class common {

    constructor() {
        gsap.registerPlugin(ScrollTrigger);
        // barba.hooks.beforeOnce((data) => {
        //     console.log('once')
        //     this.load();
        // })
        // barba.hooks.after((data) => {
        //     console.log('after')
        //     this.load();
        // });
    }

    load() {
        console.log('load')
        const osInstance = OverlayScrollbars(document.querySelector('body'), {
            showNativeOverlaidScrollbars: true,
        });

        this.loader();
        this.scrollEvent();
        this.setDeviceClassToBody();
        this.globalMenu();
        this.smoothScroll();
        // this.cMouseStalker();
        this.jsClone();
        this.jsStickySection();
        this.jsAccordion();
        this.isVisible();
        this.isVisibleType();
    }

    reload() {
    }

    /*
     * loader()
     * ローディング処理
     */
    loader() {
        // vars
        let loadedClass = 'loadedLower';
        let classNameScroll = 'is-scrolled';
        let marginScrolled = 300;

        // functions
        // ロードクラス付与
        setTimeout(function(){
            $('body').addClass(loadedClass);
        },500);

        // スクロール判定
        $(window).on('scroll resize orientationchange', function(){
            let margin = marginScrolled;
            if ($(this).scrollTop() > margin) {
                $('body').addClass(classNameScroll);
            } else if ($(this).scrollTop() <= margin) {
                $('body').removeClass(classNameScroll);
            }
        });
    }

    /*
     * scrollEvent
     * スクロール動作
     */
    scrollEvent() {
        // vars
        let defPos = 0;

        // functions
        $(window).scroll(function() {
            debounce(addBodyScrollClass, 10);
        });
        function addBodyScrollClass() {
            let currentPos = $(window).scrollTop();
            if (currentPos > defPos) {
                if($(window).scrollTop() >= 200) {
                    $('body').addClass('scrollDown');
                    $('body').removeClass('scrollUp');
                }
            } else {
                $('body').removeClass('scrollDown');
                $('body').addClass('scrollUp');
            }
            defPos = currentPos;
        }
        function debounce(method, delay) {
            clearTimeout(method._tId);
            method._tId= setTimeout(function() {
                method();
            }, delay);
        }

        // footerクラス
        const footer = '.l-footer'
        if ($(footer).length) {
            ScrollTrigger.create({
                trigger: footer,
                start: 'top bottom',
                onEnter: () => document.body.classList.add('is-footer-show'),
                onLeaveBack: () => document.body.classList.remove('is-footer-show'),
            });
        }
    }

    /*
     * globalMenu
     * グローバルメニューの動作
     */
    globalMenu() {

        // vars
        let classNameNavOpen = 'is-nav-open';
        let classNameNavClose = 'is-nav-closing';
        let $header = $('.l-header');
        let $headerMenu = $('.l-header-menu');
        let $headerNav = $('.l-header-drawer');

        // functions
        // ハンバーガーメニュー
        $headerMenu.on('click', function() {
            setNavHeight();
            $headerMenu.toggleClass(classNameNavOpen);
            if ($headerMenu.hasClass(classNameNavOpen)) {
                $('body').addClass('no-scroll').addClass(classNameNavOpen);
            } else {
                navClose()
            }
        });
        $header.find('a').on('click', function() {
            $headerMenu.removeClass(classNameNavOpen);
            navClose()
        });
        function setNavHeight() {
            $headerNav.css('height', (window.innerHeight - $header.height()) + 'px');
        }

        function navClose() {
            $('body').removeClass('no-scroll').removeClass(classNameNavOpen).addClass(classNameNavClose);
            setTimeout(function(){
                $('body').removeClass(classNameNavClose);
            },1000);
        }

        $(window).keydown(function(event) {
            if (event.keyCode == 27) {
                $headerMenu.removeClass(classNameNavOpen);
                navClose()
            }
        });
    }
    /*
     * smoothScroll
     * アンカーリンクのスムーススクロール
     */
    smoothScroll() {

        // vars
        let elm = $('a[data-scroll-anchor]');

        // functions
        elm.not('.noscroll').click(function () {
            let href = $(this).attr('href');
            let index = href.indexOf("#");
            let target = $(href.slice(index));
            let targetPos = target.offset().top; // 移動する位置
            let scrollTop = $(window).scrollTop(); // 現在のスクロール位置
            let scroll = scrollTop - targetPos; // 移動量
            let duration = 300;

            // 移動量がマイナスの場合
            if (scroll < 0) {
                scroll = scroll * (-1);
            }
            duration = 0.7 * scroll; // 1pxを0.7ミリ秒（0.0007秒）で移動した場合の時間

            // 時間が100ミリ秒以上は300ミリ秒に設定
            if (duration > 300) {
                duration = 300;
            }

            $('html, body').animate({
                scrollTop: targetPos
            }, duration, 'swing', function(){
                location.href = href;
            });
            return false;
        });
    }

    cMouseStalker() {
        const btn = '.c-btn-stalker'
        const circle = '.c-btn-stalker__circle'
        const ico = '.c-btn-stalker__ico'

        if ($(btn).length && ScrollTrigger.isTouch !== 1) {
            $(document).on('mousemove', function(e){
                // console.log(e.clientX, e.clientY)
                let shift = $(btn).width() / 2;
                gsap.to(circle, {
                    x: e.clientX-shift,
                    y: e.clientY-shift,
                    // ease: 'power2.out',
                    ease: 'power1.out',
                    // overwrite: true,
                });
                gsap.to(ico, {
                    x: e.clientX-shift,
                    y: e.clientY-shift,
                    ease: 'power1.out',
                    delay: 0.005,
                    // overwrite: true,
                });
            });
            $('.js-stalker-show').on('mouseover', function(){
                $(btn).addClass('on-stalker-show')
            })
            $('.js-stalker-show').on('mouseout', function(){
                $(btn).removeClass('on-stalker-show')
            })
        }
    }


    jsClone() {
        // const dom = '.js-clone, .p-top-about__galleryList img'
        const dom = '.js-clone'

        $(dom).each(function(){

            $(this).clone(true).insertAfter(this);
        });
    }

    jsStickySection() {
        const container = '.js-sticky-section'
        const pin = '.js-sticky-section__aside'
        const asideLi = '.js-sticky-section__aside li'
        const section = '.js-sticky-section__content section'

        if ($(container).length && Utility.isPC()) {
            $(window).on('load', function(){
                // sticky
                ScrollTrigger.create({
                    trigger: container,
                    start: 'top top+=160px',
                    end: 'bottom top+=' + $(pin).find('ul').innerHeight(),
                    pin: pin,
                    // scrub: true,
                    pinSpacing: false,
                    markers: false,
                });
                // 現在地表示
                $(section).each(function(index){
                    ScrollTrigger.create({
                        trigger: this,
                        start: 'top top+=160px',
                        end: 'bottom top+=160px',
                        markers: false,
                        onEnter: () => {
                            $(asideLi).removeClass('is-current')
                            $(asideLi).eq(index).addClass('is-current')
                        },
                        onEnterBack: () => {
                            $(asideLi).removeClass('is-current')
                            $(asideLi).eq(index).addClass('is-current')
                        },
                    });
                })
            })
        }
    }

    jsAccordion() {
        // vars
        const btn = '.js-accordion';

        // functions
        if ($(btn).length) {
            $(btn).on('click', function(e){
                e.preventDefault()
                let isFlex = $(this).attr('data-accordion-flex')? true: false;
                $(this).toggleClass('is-open')
                if ($(this).hasClass('is-open')) {
                    if (isFlex) {
                        $(this).next().stop(0, 0).slideDown({
                            start: function () {
                                $(this).css({
                                    display: "flex"
                                })
                            }
                        })
                    } else {
                        $(this).next().stop(0, 0).slideDown()
                    }
                } else {
                    $(this).next().stop(0, 0).slideUp()
                }
            })
        }
    }

    isVisible() {
        const dom = '.js-visible'

        $(dom).each(function(){
            ScrollTrigger.create({
                trigger: this,
                toggleClass: 'is-visible',
                start: 'top bottom-=20%',
                once: true,
            })
        });
    }

    isVisibleType() {
        const domList = document.querySelectorAll('.js-visible-type');

        if (domList.length) {
            for (let i = 0; i < domList.length; i++) {
                Utility.convertSpiltSpan(domList[i])
            }
            const txtList = '.js-visible-type';
            $(txtList).each(function(){
                let txt = $(this).find('span');
                gsap.set(txt, {opacity: 0, y: '20%'})
                gsap.to(txt, {
                    scrollTrigger: {
                        trigger: this,
                        start: 'top bottom-=20%',
                    },
                    delay: 0.5,
                    opacity: 1,
                    y: '0%',
                    stagger: 0.03,
                    ease: 'poser3.out',
                });
            })
        }
    }

    /*globalMenu
     * setDeviceClassToBody
     * デバイスサイズによるクラス付
     */
    setDeviceClassToBody() {
        $(window).on('load resize orientationchange', () => {
            const body = document.querySelector('body');
            if (Utility.isSP()) {
                body.classList.add('isSP');
            } else {
                body.classList.remove('isSP');
            }
            if (Utility.isTAB()) {
                body.classList.add('isTAB');
            } else {
                body.classList.remove('isTAB');
            }
            if (Utility.isPC()) {
                body.classList.add('isPC');
            } else {
                body.classList.remove('isPC');
            }

        });
    }
}

