
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import Axios from 'axios';
import Typeahead from './components/Typeahead.vue'

Vue.prototype.$http = Axios

new Vue({
    el: '#app',
    data: {
    	peoples: [{
    		name: "John",
    		alias: ''
    	}, {
    		name: "Sandra",
    		alias: ''
    	}]
    },
    components: {
    	Typeahead
    },
    methods: {
    	SelectItem(item, index) {
    		this.peoples[index].alias = item.name;
    	}
    }
});
