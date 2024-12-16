// Set axios defaults to use for each request
import axios from 'axios';
axios.defaults.baseURL = indexJSVars.ajaxurl;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

import Alpine from 'alpinejs'
window.Alpine = Alpine
import collapse from "@alpinejs/collapse";
import morph from "@alpinejs/morph";
import persist from "@alpinejs/persist";
import focus from "@alpinejs/focus";
import ui from "@alpinejs/ui";

import Swiper from "swiper";
import 'swiper/swiper-bundle.css';
window.Swiper = Swiper;

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);


Alpine.plugin([collapse, focus, morph, persist, ui]);

Alpine.start();

// Animations
import './animations/fadeInOnScroll';
import './animations/smoothScroll';

// Import main scss file here. This will compile to a css file in the dist folder
import '../scss/style.scss';
