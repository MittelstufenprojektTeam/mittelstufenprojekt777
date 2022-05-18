import Vue from 'vue'
import Nav from "./components/Nav"
import VueRouter from "vue-router";
Vue.use(VueRouter);
require('../css/app.css');


const router = new VueRouter({
    routes: [
        {
            path: '/Home',
            component: Nav,
        },
        {
            path: '/exam',
            component: Nav,
            children: [
                {
                    path: ':id',
                    component: Nav,
                },
            ]
        },
        {
            path: '/learning',
            component: Nav,
            children: [
                {
                    path: ':id',
                    component: Nav,
                }
            ]
        },
        {
            path: '/',
        },
        {
            path: '/*',
            component: Nav,
            beforeEnter: (to, from, next) => {
                next({
                    path: '/Home',
                    replace: true,
                });
            },
        }
    ]
})

new Vue({
    render: h => h(Nav),
    el: '#app',
    router,
    components: {Nav}
});


