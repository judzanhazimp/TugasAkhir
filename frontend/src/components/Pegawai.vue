<template>
  <div class="" style="position:relative; bottom:60px"><br>
    <p style="color:grey; font-size:20px;">__________________________________________________________________________</p>
    <center>
    <h1>Data Pegawai</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:350px;">back</button>
    </router-link>
    <router-link to="/pegawai/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:350px;">tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>JK</th>
        <th>Tempat,Tanggal,Lahir</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(pegawai, i) in data_pegawai" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ pegawai.nip }}</td>
          <td>{{ pegawai.nama }}</td>
          <td>{{ pegawai.jk }}</td>
          <td>{{ pegawai.ttl }}</td>
          <td>{{ pegawai.alamat }}</td>
          <td>
            <router-link :to="'/pegawai/' + pegawai.id"><button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(pegawai.id)" class="btn btn-sm btn-danger">delete</button>
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
  name: 'Pegawai',
  data () {
    return {
      data_pegawai: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:8080/TugasAkhir/public/'
      let url2 = 'pegawai'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_pegawai = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:8080/TugasAkhir/public/pegawai/'
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
