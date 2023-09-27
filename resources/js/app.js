import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import './chart.js';
// import { createApp } from 'vue/dist/vue.esm-bundler';
// import App from './App.vue';

// const app = createApp(App);

// app.mount('#app');

// //<-------------------------------------->//
// import vueCounter from "./vueContrroler";

// createApp({
//   setup() {

//     // カウンターを更新する
//     const { counter } = vueCounter();

//     return {
//       counter,
//     };
//   },
// }).mount("#counter");

// //splide
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

if (document.getElementById("splide-scope") != null) {
  new Splide('.splide', {
    type: 'loop',
    padding: '10rem',
    gap: '3rem',
  }).mount();
}

if (document.getElementById("auto-splide-scope") != null) {
  const splide = new Splide('.splide', {
    type: 'loop',
    drag: 'free',
    focus: 'center',
    perPage: 4,
    autoScroll: {
      speed: 1,
    },
  });

  splide.mount({ AutoScroll });
}

// new Splide( '.splide' ).mount( { AutoScroll } ); 自動スクロールをする

import '@splidejs/splide/css';
import '@splidejs/splide/css/skyblue';
import '@splidejs/splide/css/sea-green';
import '@splidejs/splide/css/core';