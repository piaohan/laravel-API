import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Vue.component('Home', requier('./pages/Home.vue'))
        },
        {
            path: '/cafes',
            name: 'cafes',
            component: Vue.component('Cafes', requier('./pages/Cafes.vue'))
        },
        {
            path: '/cafes/new',
            name: 'newcafe',
            component: Vue.component('NewCafe', requier('./pages/NewCafe.vue'))
        },
        {
            path: '/cafes/:id',
            name: 'cafe',
            component: Vue.component('Cafe', requier('./pages/Cafe.vue'))
        }
    ]
});
