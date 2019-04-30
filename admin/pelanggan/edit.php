<?php

$KTP = $_GET['ktp'];
 if (isset($_POST['submit'])){
 
//tangkap data dari form
$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
 
//update data di database sesuai nip
$query = mysql_query("update pelanggan set NOKTP='$no_ktp', NAMAPEL='$nama', ALAMATPEL='$alamat', TELPPEL='$telp' where NOKTP='$KTP'") or die(mysql_error());
 
if ($query) {
   echo "<script>window.location='?page=pelangganview';</script>";
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


<?php
$query = mysql_query("select * from pelanggan where NOKTP='$KTP'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit Data</h4>
                      <form class="form-horizontal style-form" name="update_data" action="" method="post">
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. KTP</label>
                              <div class="col-sm-4">
                                  <input class="form-control" type="text" name="no_ktp" required value="<?php echo $data['NOKTP']; ?>">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="nama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" required value="<?php echo $data['NAMAPEL']; ?>">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="alamat" required  value="<?php echo $data['ALAMATPEL']; ?>" onKeyPress="return goodchars(event,'1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,.() ',this)">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="telp"  onKeyPress="return goodchars(event,'1234567890',this)" required value="<?php echo $data['TELPPEL']; ?>">
                              </div>
                          </div>
                          
                
                <a button type="button" class="btn btn-primary" href="?page=pelangganview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td> 
           
        </tr>
                  </div>
                  
          		 </form>
          

      <!--main content end-->
