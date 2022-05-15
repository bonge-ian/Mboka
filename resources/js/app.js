/**
 * UIkit js components
 * Load the necessary components that you will require
 */

// IMPORTS
// import Countdown from "uikit/dist/js/components/countdown";
// import Filter from 'uikit/dist/js/components/filter';
// import Lightbox from 'uikit/dist/js/components/lightbox';
// import LightboxPanel from 'uikit/dist/js/components/lightbox-panel';
import Notification from "uikit/dist/js/components/notification";
// import Parallax from 'uikit/dist/js/components/parallax';
// import Slider from "uikit/dist/js/components/slider";
// import SliderParallax from 'uikit/dist/js/components/slider-parallax';
// import Slideshow from "uikit/dist/js/components/slideshow";
// import SlideshowParallax from "uikit/dist/js/components/slideshow-parallax";
// import Sortable from 'uikit/dist/js/components/sortable';
// import Tooltip from "uikit/dist/js/components/tooltip";
// import Upload from 'uikit/dist/js/components/upload';
import UIkit from "uikit";
import UIkitIcons from "uikit/dist/js/uikit-icons";

// USAGE
// UIkit.component('countdown', Countdown);
// UIkit.component('filter', Filter);
// UIkit.component('lightbox', Lightbox);
// UIkit.component('lightboxPanel', LightboxPanel);
UIkit.component("notification", Notification);
// UIkit.component('parallax', Parallax);
// UIkit.component('slider', Slider);
// UIkit.component('sliderParallax', SliderParallax);
// UIkit.component('slideshow', Slideshow);
// UIkit.component("slideshowParallax", SlideshowParallax);
// UIkit.component('sortable', Sortable);
// UIkit.component('tooltip', Tooltip);
// UIkit.component('upload', Upload);

UIkit.use(UIkitIcons);

UIkit.icon.add({
    logo: `
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="120.4408006913546" height="35.78201634877382" viewBox="0.10899182561307441 0.10899182561308507 120.4408006913546 35.78201634877382" xml:space="preserve">
        <defs>
        </defs>
        <g transform="matrix(0.76 0 0 0.36 38.19 18)" id="7ReOBNdyPPtikB2RQLog5">
            <path style="stroke: rgb(100,28,122); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(25,145,238); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" transform=" translate(0, 0)" d="M -50 -50 L 50 -50 L 50 50 L -50 50 z" stroke-linecap="round" />
        </g>
        <g transform="matrix(1 0 0 1 38.19 16.36)" style="" id="fvnNp9WnhJfSo9RV-lsPS">
            <text xml:space="preserve" font-family="Mulish" font-size="25" font-style="normal" font-weight="900" line-height="1" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; white-space: pre;">
                <tspan x="-30" y="9.98">MBO</tspan>
            </text>
        </g>
        <g transform="matrix(1 0 0 1 100.93 16.36)" style="" id="H3uhG-lk6TU5pzOf6288O">
            <text xml:space="preserve" font-family="Mulish" font-size="25" font-style="normal" font-weight="900" line-height="1" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1; white-space: pre;">
                <tspan x="-19.12" y="9.98">KA</tspan>
            </text>
        </g>
        </svg>

    `,
    skyscraper: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-skyscraper" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <line x1="3" y1="21" x2="21" y2="21"></line>
    <path d="M5 21v-14l8 -4v18"></path>
    <path d="M19 21v-10l-6 -4"></path>
    <line x1="9" y1="9" x2="9" y2="9.01"></line>
    <line x1="9" y1="12" x2="9" y2="12.01"></line>
    <line x1="9" y1="15" x2="9" y2="15.01"></line>
    <line x1="9" y1="18" x2="9" y2="18.01"></line>
    </svg>`,
    sparkles: `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
    </svg>`,
    briefcase: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <rect x="3" y="7" width="18" height="13" rx="2"></rect>
    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
    <line x1="12" y1="12" x2="12" y2="12.01"></line>
    <path d="M3 13a20 20 0 0 0 18 0"></path>
    </svg>`,
    verified: `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
</svg>`,
    pinned: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pinned" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M9 4v6l-2 4v2h10v-2l-2 -4v-6"></path>
   <line x1="12" y1="16" x2="12" y2="21"></line>
   <line x1="8" y1="4" x2="16" y2="4"></line>
</svg>`,
    circle: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <desc>Download more icon variants from https://tabler-icons.io/i/circle</desc>
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <circle cx="12" cy="12" r="9"></circle>
</svg>`,
    detail: `<svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' width='24' height='24'><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path></svg>`,
    analyse: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" ><path d="M2 12h2a7.986 7.986 0 0 1 2.337-5.663 7.91 7.91 0 0 1 2.542-1.71 8.12 8.12 0 0 1 6.13-.041A2.488 2.488 0 0 0 17.5 7C18.886 7 20 5.886 20 4.5S18.886 2 17.5 2c-.689 0-1.312.276-1.763.725-2.431-.973-5.223-.958-7.635.059a9.928 9.928 0 0 0-3.18 2.139 9.92 9.92 0 0 0-2.14 3.179A10.005 10.005 0 0 0 2 12zm17.373 3.122c-.401.952-.977 1.808-1.71 2.541s-1.589 1.309-2.542 1.71a8.12 8.12 0 0 1-6.13.041A2.488 2.488 0 0 0 6.5 17C5.114 17 4 18.114 4 19.5S5.114 22 6.5 22c.689 0 1.312-.276 1.763-.725A9.965 9.965 0 0 0 12 22a9.983 9.983 0 0 0 9.217-6.102A9.992 9.992 0 0 0 22 12h-2a7.993 7.993 0 0 1-.627 3.122z"></path><path d="M12 7.462c-2.502 0-4.538 2.036-4.538 4.538S9.498 16.538 12 16.538s4.538-2.036 4.538-4.538S14.502 7.462 12 7.462zm0 7.076c-1.399 0-2.538-1.139-2.538-2.538S10.601 9.462 12 9.462s2.538 1.139 2.538 2.538-1.139 2.538-2.538 2.538z"></path></svg>`,
    wallet: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <desc>Download more icon variants from https://tabler-icons.io/i/wallet</desc>
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
    <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
    </svg>`,
    "calender-check": `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" ><path d="M19 4h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm.002 16H5V8h14l.002 12z"></path><path d="m11 17.414 5.707-5.707-1.414-1.414L11 14.586l-2.293-2.293-1.414 1.414z"></path></svg>`,
    "eye-check": `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <desc>Download more icon variants from https://tabler-icons.io/i/eye-check</desc>
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <circle cx="12" cy="12" r="2"></circle>
    <path d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033"></path>
    <path d="M15 19l2 2l4 -4"></path>
    </svg>`,
    click: `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-click" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <desc>Download more icon variants from https://tabler-icons.io/i/click</desc>
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <line x1="3" y1="12" x2="6" y2="12"></line>
    <line x1="12" y1="3" x2="12" y2="6"></line>
    <line x1="7.8" y1="7.8" x2="5.6" y2="5.6"></line>
    <line x1="16.2" y1="7.8" x2="18.4" y2="5.6"></line>
    <line x1="7.8" y1="16.2" x2="5.6" y2="18.4"></line>
    <path d="M12 12l9 3l-4 2l-2 4l-3 -9"></path>
    </svg>`,
});

window.UIkit = UIkit;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
