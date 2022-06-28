require('./bootstrap');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
import flatpickr from "flatpickr";

window.Alpine = Alpine;
Alpine.plugin(persist);
Alpine.plugin(flatpickr);
Alpine.start();



