/**
 * UIkit js components
 * Load the necessary components that you will require
 */

// IMPORTS
// import Countdown from "uikit/dist/js/components/countdown";
// import Filter from 'uikit/dist/js/components/filter';
// import Lightbox from 'uikit/dist/js/components/lightbox';
// import LightboxPanel from 'uikit/dist/js/components/lightbox-panel';
import Notification from 'uikit/dist/js/components/notification';
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
UIkit.component('notification', Notification);
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
