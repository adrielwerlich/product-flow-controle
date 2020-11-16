import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter)

import LandingPage from './views/LandingPage.vue';
import Login from './views/Login.vue';
import ProductSubmission from './views/ProductSubmission.vue';
import ApproveSubmission from './views/ApproveSubmission.vue';
import ClientView from './views/ClientView.vue';
const routes = [
    {
        path: '/',
        component: LandingPage,
        name: 'LandingPage',
        children: [
          {
            path: '/login',
            component: Login,
            name: 'Login'
          },
          {
            path: '/product-submission',
            component: ProductSubmission,
            name: 'SubmitProduct'
          },
          {
            path: '/approve-submission',
            component: ApproveSubmission,
            name: 'ApproveSubmission'
          },
          {
            path: '/client-view',
            component: ClientView,
            name: 'ClientView'
          },
        ]
    },
    
]

export default new VueRouter({ mode: 'history', routes: routes })