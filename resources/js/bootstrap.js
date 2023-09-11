window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    
    require('bootstrap');
    require('@fortawesome/fontawesome-free');
    require('moment');
    require('daterangepicker');

    
    require('admin-lte/plugins/summernote/summernote-bs4');
    require('admin-lte/plugins/select2/js/select2.full.min.js');
    require('admin-lte/dist/js/adminlte');



} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

