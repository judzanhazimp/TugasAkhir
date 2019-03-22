<template>
  <div style="position:relative; bottom:60px"><br><br>
        <p style="color:grey; font-size:20px;">__________________________________________________________________________</p>
        <center>
    <router-link to="/barang">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Edit Barang</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Barang </label></td>
        <td><input type="text" v-model="barang.nama"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Jumlah </label></td>
        <td><input type="number"  v-model="barang.jumlah" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Harga </label></td>
        <td><input type="number" v-model="barang.harga" class="form-control" required></td>
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
  name: 'BarangForm',
  data () {
    return {
      barang: {
        id: null,
        nama: '',
        jumlah: '',
        harga: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:8080/TugasAkhir/public/barang/'
      api.get(url + id).then(res => {
        this.barang = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.barang
      let url = 'http://localhost:8080/TugasAkhir/public/barang'

      if (this.barang.id) {
        url += '/' + this.barang.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/barang')
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
