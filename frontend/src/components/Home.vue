<template>
    <div class="hello" style="position:relative; bottom:60px; top:70px; left:150px; width: 1200px; border:3px solid darkgrey;"><br><br>
    <center>
    <table style="position:bg; bottom:120px;">
      <tr>
        <td><router-link to="/pegawai"><img src="../assets/pegawai.png" style="position:relative; right:60px; bottom:10px; border-radius:50%; height:280px;"><h2 style="position:relative; left:20px; background-color:">pegawai</h2></router-link></td>
        <td><router-link to="/barang"><img src="../assets/barang.png" style="position:relative; bottom:10px;left:30px; border:5px solid black;background-color:#eee; border-radius:50%; height:280px;"><h2 style="position:relative; left:120px;">Barang</h2></router-link></td>
      </tr>
    </table><br>
    <div style="background-color:#eee; padding:20px; position:relative;">
        <b><i style="color:grey;">@Copyright.Judzan</i></b>
    </div>
    </center>
    </div>
</template>
<style type="text/css">
    .hello {
        background-image: url('../assets/bg.jpg');
    }
</style>
