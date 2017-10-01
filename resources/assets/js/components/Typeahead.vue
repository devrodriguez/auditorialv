<!-- Usage: 
  For Local Source: 
    - Define and set Vuex.$store.state   
    - Set propertie cpLocal as true
    - Set propertie cpStoreKey with the key defined in Vuex
-->


<template>
  <div class="Typeahead">
    <i class="fa fa-spinner fa-spin" v-if="loading"></i>
    <template v-else>
      <i class="fa fa-search" v-show="isEmpty"></i>
      <i class="fa fa-times" v-show="isDirty" @click="reset"></i>
    </template>

    <input type="text"
           class="Typeahead__input"
           :placeholder="placeholder"
           autocomplete="off"
           v-model="query"
           @keydown.down="down"
           @keydown.up="up"
           @keydown.enter="hit"
           @keydown.esc="reset"
           @blur="reset"
           @input="onUpdate($event.target.value)"/>

    <ul v-show="hasItems">
      <li v-for="(item, $item) in items" :class="activeClass($item)" @mousedown="hit" @mousemove="setActive($item)">
        <span class="name" v-html="FormatSuggestion(item)"></span>
        <!--<span class="screen-name" v-text="item.screen_name"></span>-->
      </li>
    </ul>
  </div>
</template>



<script>
import VueTypeahead from 'vue-typeahead'
import _ from 'lodash'

export default {
  extends: VueTypeahead,

  props: {
  	cpSrc: {
  		type: String
  	},
  	placeholder: {
  		type: String,
  		default: '...'
  	},
  	cpdata: {
  		type: Object
  	},
  	cpLimit: {
  		type: Number,
  		default: 5
  	},
  	cpminchars: {
  		type: Number,
  		default: 3
  	},
  	cpselectfirst: {
  		type: Boolean,
  		default: true
  	},
  	cpqueryparam: {
  		default: 'q'
  	},
  	cpIndex: {
  		type: Number
  	},
    // If the source is locasl as array object
    // If this value is true should be set this.localSource
    // p. ej. this.items = [{a:1}]
    cpLocal: {
      type: Boolean,
      default: false
    },
    // Data key defined in Vuex.$store.state
    cpStoreKey: {
      type: String,
      default: 'data_'
    },
    // String Keys for order
    cpOrder: {
      type: Array,
      default: []
    }
  },

  data () {
    return {
      // The source url
  		// (required)
  		src: this.cpSrc,
  		//src: 'https://typeahead-js-twitter-api-proxy.herokuapp.com/demo/search',

  		// The data that would be sent by request
  		// (optional)
  		data: this.cpdata,

  		// Limit the number of items which is shown at the list
        	// (optional)
  		limit: this.cpLimit,

  		// The minimum character length needed before triggering
        	// (optional)
  		minChars: this.cpminchars,

  		// Highlight the first item in the list
  		// (optional)
  		selectFirst: this.cpselectfirst,

  		// Override the default value (`q`) of query parameter name
  		// Use a falsy value for RESTful query
  		// (optional)
  		queryParamName: this.cpqueryparam,

    }
  },

  methods: {
    onHit (item) {
    	this.$emit('select-item', item, this.cpindex);
      //window.location.href = 'http://twitter.com/' + item.screen_name
    },

    // The callback function which is triggered when the response data are received
    // (optional)
    prepareResponseData (data) {
      // data = ...
      return data
    },
    onUpdate (value) {

      if(this.cpLocal){
        // If data key exist in Vuex store
        if(!this.$store.state[this.cpStoreKey]){
          throw 'Set data source in Vuex.store.state'
        }

        // Filter data from stored in the store (Vuex)
        var itemsFiltered = this.$store.state[this.cpStoreKey].filter(itemFilt => {
          var exp = new RegExp(this.query, 'gi')
          return exp.test(itemFilt.name);
        });

        // Order data filtered (Lodash)
        var itemsOrdered = _.orderBy(itemsFiltered, this.cpOrder);

        // Set data
        this.localSource = itemsOrdered;

        //if (this.selectFirst) {
          //this.down()
        //}
      }

      // Execute default method update
      this.update();

      // For use v-model in the component
      this.$emit('input', value);

    },
    FormatSuggestion(item) {
      var reg = new RegExp(this.query, 'gi');
      var replacement = '<b>$&</b>';
      var replaced = item.name.replace(reg, replacement);

      return replaced;
    }
  },
  mounted () {
    
  }
}
</script>



<style scoped>
.Typeahead {
  position: relative;
}

.Typeahead__input {
  width: 100%;
  font-size: 12px;
  color: #2c3e50;
  line-height: 1.42857143;
  box-shadow: inset 0 1px 4px rgba(0,0,0,.4);
  -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  font-weight: 300;
  padding: 12px 26px;
  border: none;
  border-radius: 22px;
  letter-spacing: 1px;
  box-sizing: border-box;
}

.Typeahead__input:focus {
  border-color: #4fc08d;
  outline: 0;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #4fc08d;
}

.fa-times {
  cursor: pointer;
}

i {
  float: right;
  position: relative;
  top: 30px;
  right: 29px;
  opacity: 0.4;
}

ul {
  position: absolute;
  padding: 0;
  margin-top: 8px;
  min-width: 100%;
  background-color: #fff;
  list-style: none;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0,0,0, 0.25);
  z-index: 1000;
}

li {
  padding: 10px 16px;
  border-bottom: 1px solid #ccc;
  cursor: pointer;
}

li:first-child {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

li:last-child {
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom: 0;
}

span {
  display: block;
  color: #2c3e50;
}

.active {
  background-color: #3aa373;
}

.active span {
  color: white;
}

.name {
  font-size: 16px;
}

.screen-name {
  font-style: italic;
}
</style>