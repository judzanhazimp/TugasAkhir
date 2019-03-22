import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Pegawai from '@/components/Pegawai'
import PegawaiForm from '@/components/PegawaiForm'
import Barang from '@/components/Barang'
import BarangForm from '@/components/BarangForm'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/barang',
      name: 'Barang',
      component: Barang
    },
    {
      path: '/barang/create',
      name: 'BarangCreate',
      component: BarangForm
    },
    {
      path: '/barang/:id',
      name: 'BarangEdit',
      component: BarangForm
    },
    {
      path: '/pegawai',
      name: 'Pegawai',
      component: Pegawai
    },
    {
      path: '/pegawai/create',
      name: 'PegawaiCreate',
      component: PegawaiForm
    },
    {
      path: '/pegawai/:id',
      name: 'PegawaiEdit',
      component: PegawaiForm
    }
  ]
})
