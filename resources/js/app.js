require('./bootstrap');
require('bootstrap');
require('jquery');
require('@popperjs/core')
import jquery from 'jquery';
window.Jquery = jquery;
window.$ = jquery;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

require('./custom');