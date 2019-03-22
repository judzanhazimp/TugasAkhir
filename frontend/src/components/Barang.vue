<template>
  <div class="" style="position:relative; bottom:60px"><br>
    <p style="color:grey; font-size:20px;">__________________________________________________________________________</p>
    <center>
    <h1>Data barang</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:350px;">back</button>
    </router-link>
    <router-link to="/barang/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:350px;">tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(barang, i) in data_barang" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ barang.nama }}</td>
          <td>{{ barang.jumlah }}</td>
          <td>{{ barang.harga }}</td>
          <td>
            <router-link :to="'/barang/' + barang.id"><button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(barang.id)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
    </table>
    </center>
    <p style="color:grey; font-size:20px;">__________________________________________________________________________</p>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Barang',
  data () {
    return {
      data_barang: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:8080/TugasAkhir/public/'
      let url2 = 'barang'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_barang = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:8080/TugasAkhir/public/barang/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
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
