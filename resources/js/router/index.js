import Vue from 'vue';
import VueRouter from 'vue-router';
import VuePageTransition from 'vue-page-transition'
import InicioGaleria from '../components/InicioGaleria'
import MostrarRegistro from '../components/MostrarRegistro'

const routes = [
    {
        path:'/',
        component: InicioGaleria
    },
    {
        path:'/establecimiento/:id',
        name:"establecimiento",
        component: MostrarRegistro
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.use(VueRouter);
Vue.use(VuePageTransition);

export default router;
