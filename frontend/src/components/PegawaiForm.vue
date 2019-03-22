<template>
  <div style="position:relative; bottom:60px"><br><br>
        <p style="color:grey; font-size:20px;">__________________________________________________________________________</p>
        <center>
    <router-link to="/pegawai">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Edit Pegawai</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>NIP </label></td>
        <td><input type="text" v-model="pegawai.nip"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Nama Lengkap </label></td>
        <td><input type="text"  v-model="pegawai.nama" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Jenis kelamin </label></td>
        <td><input type="text" v-model="pegawai.jk" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Tempat,Tanggal ,Lahir </label></td>
        <td><input type="text" v-model="pegawai.ttl" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Alamat </label></td>
        <td><input type="text" v-model="pegawai.alamat" class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-info" style="position:relative; left:360px;">Save</button>
    </form>
    </center>
    <p style="color:grey; font-size:20px;">__________________________________________________________________________</p>
  </div>
</template>
<script>
import {api} from '@/helper/api'

export default {
  name: 'pegawaiForm',
  data () {
    return {
      pegawai: {
        id: null,
        nip: '',
        nama: '',
        jk: '',
        ttl: '',
        alamat: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:8080/TugasAkhir/public/pegawai/'
      api.get(url + id).then(res => {
        this.pegawai = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.pegawai
      let url = 'http://localhost:8080/TugasAkhir/public/pegawai'

      if (this.pegawai.id) {
        url += '/' + this.pegawai.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/pegawai')
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
