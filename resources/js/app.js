/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('vue-bootstrap4-table', require('./components/App.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    data: {
        data: {
            rows: [],
            columns: [{
                label: "id",
                name: "id",
                filter: {
                    type: "simple",
                    placeholder: "id"
                },
                sort: true,
                uniqueId: true
            },
                {
                    label: "title",
                    name: "title",
                    filter: {
                        type: "simple",
                        placeholder: "title"
                    },
                    sort: true
                },
                {
                    label: "url",
                    name: "url",
                    filter: {
                        type: "simple",
                        placeholder: "Enter url"
                    }
                }
            ]
        },
        config: {
            pagination: true,
            num_of_visible_page: 7,
            per_page: 10,
            checkbox_rows: true
        }
    },
    methods: {
        toggle: function(todo) {
            todo.done = !todo.done
        }
    },

    mounted() {
        let self = this;
        axios.get('https://jsonplaceholder.typicode.com/photos')
            .then(function(response) {
                // handle success
                self.data.rows = response.data.slice(0,100);
                // console.log(response);
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            });
    },
})
