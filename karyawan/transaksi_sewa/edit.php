<?php
$nik=$_SESSION['NIK'];
		$kode = $_GET['nota'];
 if (isset($_POST['submit'])){

	 
//tangkap data dari form
$kode=$_POST['kode'];
$km_kembali = $_POST['km_kembali'];
$bbm = $_POST['bbm_kembali'];
$kmk_kembali = $_POST['kondisi_mobil_kembali'];
$kerusakan = $_POST['kerusakan'];
$biayakerusakan = $_POST['biayakerusakan'];
$biayabbm = $_POST['biayabbm'];
$tgl_kembali_real= $_POST['tgl_kembali_real'];
$jam_kembali_real=$_POST['jam_kembali_real'];



$sql1 =mysql_query("SELECT * FROM `transaksi_sewa` t, kendaraan k, sopir s where k.NOPLAT=t.NOPLAT AND NOTRANSAKSI='$kode' AND t.IDSOPIR=s.IDSOPIR ");
$data1 = mysql_fetch_assoc($sql1);

# Perhitungan Biaya Kendaraan
$tglSw=$data1['TGLPINJAM']; $tglRcn=$data1['TGLKEMBALIRENCANA']; $tglReal=$tgl_kembali_real;
$jamSw=$data1['JAMPINJAM']; $jamRcn=$data1['JAMKEMBALIRENCANA']; $jamReal=$jam_kembali_real;
$hrSw=$tglSw." ".$jamSw; $hrRcn=$tglRcn." ".$jamRcn; $hrReal=$tglReal." ".$jamReal;

$sel_SwToRcn=round((strtotime($hrRcn)-strtotime($hrSw))/3600,1);
$sel_RcnToReal=round((strtotime($hrReal)-strtotime($hrRcn))/3600,1);
$byKdr=$sel_SwToRcn*$data1['TARIFPERJAMKENDARAAN']; $byDenda=$sel_RcnToReal*$data1['TARIFPERJAMKENDARAAN']; 
$bySpr=($sel_RcnToReal+$sel_SwToRcn)*$data1['TARIFPERJAMSOPIR'];

//echo $tglSw." ".$tglRcn." ".$tglReal;
$query1 = mysql_query("update transaksi_sewa set KILOMETERKEMBALI='$km_kembali',BBMKEMBALI='$bbm',KONDISIMOBILKEMBALI='$km_kembali',KERUSAKAN='$kerusakan',BIAYAKERUSAKAN='$biayakerusakan',BIAYABBM='$biayabbm', TGLKEMBALIREALISASI='$tgl_kembali_real', JAMKEMBALIREAL='$jam_kembali_real' where NOTRANSAKSI='$kode' ") or die(mysql_error());

$query2 =  mysql_query("update transaksi_sewa set DENDA=$byDenda, BIAYAKENDARAANTOTAL=$byKdr, BIAYASOPIR=$bySpr  where NOTRANSAKSI='$kode'") or die(mysql_error());



if ($query1) {
     echo "<script>window.location='?page=t_kembaliview';</script>";
}}
 

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
                              <label class="col-sm-2 col-sm-2 control-label">No. Plat</label>
                              <div class="col-sm-3">                         
 <input type="text" class="form-control" name="NOPLAT"  value="<?php echo $data['NOPLAT'] ?>"  readonly="readonly">
                       </div></div>     
                       
                           
                           
                           
                           
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali Real</label>
                              <div class="col-sm-3">
                                  <input type="date" class="form-control" name="tgl_kembali_real" >
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Kembali Real</label>
                              <div class="col-sm-3">
                                  <input type="time" class="form-control" name="jam_kembali_real" >
                              </div>
                          </div>
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kilometer Kembali</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" name="km_kembali" >
                              </div>
                          </div>
                           

<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">BBM Kembali</label>
                              <div class="col-sm-3">
                           
           <input type="text" class="form-control" name="bbm_kembali" >
      
                              </div>
                          </div>
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kondisi Mobil Kembali</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="kondisi_mobil_kembali" required>
                              </div>
                          </div>
                          
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kerusakan</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="kerusakan"  required>
                              </div>
                          </div>
                     
                          
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Biaya Kerusakan</label>
                              <div class="col-sm-3">
                                    <input class="form-control" type="text" name="biayakerusakan"  required>
                              </div>
                          </div>
                          
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Biaya BBM</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="biayabbm" required>
                              </div>
                          </div>
         
       
                          </div>
                      <a button type="button" class="btn btn-primary" href="?page=t_kembaliview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td>
        </tr>
                  </div>
                  
          		
          

      <!--main content end-->
</form>