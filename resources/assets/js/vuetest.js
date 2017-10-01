
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
import Vuex from 'vuex';
import Axios from 'axios';
import Typeahead from './components/Typeahead.vue'

Vue.prototype.$http = Axios
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        data: []
    },
    mutations: {
        UpdateData(state, newData) {
            state.data = newData;
        }
    },
    actions: {
        UpdateData(context, data) {
            context.commit('UpdateData', data)
        }
    }
});

new Vue({
    el: '#app',
    store,
    data: {
    	peoples: [{
    		name: "John",
    		alias: ''
    	}, {
            name: "Sandra",
            alias: ''
        }, {
            name: "Martha",
            alias: ''
        }, {
            name: "Camila",
            alias: ''
        }],
        users: []
    },
    components: {
    	Typeahead
    },
    methods: {
    	SelectItem(item, index) {
    		this.peoples[index].alias = item.name;
    	},
        UpdateData() {
            this.$store.dispatch('UpdateData', this.users)
        }
    },
    mounted() {
        this.$http.get('https://typeahead-js-twitter-api-proxy.herokuapp.com/demo/search?q=john')
        .then(res => {
            this.users = res.data;
            this.UpdateData();
        })
    }
});
