<?php
$nik=$_SESSION['NIK'];
	$kode = $_GET['nota'];
 if (isset($_POST['submit'])){

	 
//tangkap data dari form
$kendaraan = $_POST['kendaraan'];
$km_pinjam = $_POST['km_pinjam'];
$bbm_pinjam = $_POST['bbm_pinjam'];
$kondisi = $_POST['kondisi_mobil_pinjam'];
$noplat = $_POST['kendaraan'];
$nik2 = $_POST['karyawan'];
$sopir = $_POST['sopir'];


$tgl_pesan = $_POST['tgl_pesan'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$jm_pinjam = $_POST['jm_pinjam'];
$tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
$jm_kembali_rencana = $_POST['jm_kembali_rencana'];

//simpan data ke database

$query1 = mysql_query("update transaksi_sewa set NOPLAT='$noplat',NIK='$nik2',IDSOPIR='$sopir',KILOMETERPINJAM='$km_pinjam',BBMPINJAM='$bbm_pinjam',KONDISIMOBILPINJAM='$kondisi',TGLPESAN='$tgl_pesan',TGLPINJAM='$tgl_pinjam',JAMPINJAM='$jm_pinjam',TGLKEMBALIRENCANA='$tgl_kembali_rencana'
,JAMKEMBALIRENCANA='$jm_kembali_rencana' where NOTRANSAKSI='$kode'") or die(mysql_error());


 
if ($query1) {
     echo "<script>window.location='?page=t_sewaview';</script>";
}
 
 }
 ?>
<script type="text/javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}</script>


  <!--main content start-->
     
      <?php
$query = mysql_query("select * from transaksi_sewa where NOTRANSAKSI='$kode'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>    	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Transaksi Sewa</h4>
                      <form class="form-horizontal style-form" name="input_data" action="" method="post">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Transaksi</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" name="kode" value="<?php echo $kode ?>"  readonly="readonly">
                              </div>
                          </div>
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Karyawan</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" name="karyawan" value="<?php echo $nik; ?>"  readonly="readonly">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kendaraan</label>
                              <div class="col-sm-3">
                           
            <input type="text" class="form-control" name="kendaraan" value="<?php echo $data['NOPLAT']; ?>"  readonly="readonly">
       
                              </div>
                          </div>
                          
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kilometer Pinjam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="km_pinjam" required>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">BBM Pinjam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="bbm_pinjam"  required>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kondisi Mobil Pinjam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="kondisi_mobil_pinjam"  required>
                              </div>
                          </div>
                          
                          
                         
                     
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sopir</label>
                              <div class="col-sm-3">
                                   <select class="form-control" name="sopir">
          <?php $sql=mysql_query("select * from sopir") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['IDSOPIR']; ?>"><?php echo $tmpwali['NMSOPIR']; ?></option>
          <?php } ?>  </select>
                              </div>
                          </div>
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. KTP</label>
                              <div class="col-sm-3">
                                  <input class="form-control" readonly="readonly" type="text" name="ktp"  value="<?php echo $data['NOKTP']; ?>" required>
                              </div>
                          </div>
                          
                       
    
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Pesan</label>
                              <div class="col-sm-3">
                                  <input class="form-control" readonly="readonly" type="date" name="tgl_pesan" value="<?php echo $data['TGLPESAN']; ?>" required>
                              </div>
                          </div>
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" readonly="readonly" type="date" name="tgl_pinjam" value="<?php echo $data['TGLPINJAM']; ?>" required>
                              </div>
                          </div>
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Pinjam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" readonly="readonly" type="text" name="jm_pinjam" value="<?php echo $data['JAMPINJAM']; ?>" required>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali Rencana</label>
                              <div class="col-sm-3">
                                  <input class="form-control" readonly="readonly" type="date" name="tgl_kembali_rencana"  value="<?php echo $data['TGLKEMBALIRENCANA']; ?>"required>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Kembali Rencana</label>
                              <div class="col-sm-3">
                                  <input class="form-control" readonly="readonly" type="text" name="jm_kembali_rencana"  value="<?php echo $data['JAMKEMBALIRENCANA']; ?>"required>
                              </div>
                          </div>
                          
                      
                          </div>
                      <a button type="button" class="btn btn-primary" href="?page=t_pesanview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td>
        </tr>
                  </div>
                  
          		
          

      <!--main content end-->
</form>