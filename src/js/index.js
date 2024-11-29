// Set axios defaults to use for each request
import axios from 'axios';
axios.defaults.baseURL = indexJSVars.ajaxurl;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

// Animations
import './animations/fadeInOnScroll';
import './animations/smoothScroll';

// Import main scss file here. This will compile to a css file in the dist folder
import '../scss/style.scss';
