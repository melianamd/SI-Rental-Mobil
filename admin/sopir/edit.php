<?php

$ID = $_GET['id'];
 if (isset($_POST['submit'])){
 
//tangkap data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$no_sim = $_POST['no_sim'];
$tarif = $_POST['tarif'];
 
//update data di database sesuai nip
$query = mysql_query("update sopir set NMSOPIR='$nama', ALMTSOPIR='$alamat', TELPSOPIR='$telp', NOSIM='$no_sim', TARIFPERJAMSOPIR='$tarif' where IDSOPIR='$ID'") or die(mysql_error());
 
if ($query) {
   echo "<script>window.location='?page=sopirview';</script>";
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
$query = mysql_query("select * from sopir where IDSOPIR='$ID'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit Data</h4>
                      <form class="form-horizontal style-form" name="update_data" action="" method="post">
                      <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" type="text" name="kode" required readonly="readonly" value="<?php echo $data['IDSOPIR']; ?>" >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="nama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .,',this)" required value="<?php echo $data['NMSOPIR']; ?>">
                              </div>
                          </div>
                          
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="alamat" required  value="<?php echo $data['ALMTSOPIR']; ?>" onKeyPress="return goodchars(event,'1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,.() ',this)">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="telp"  onKeyPress="return goodchars(event,'1234567890',this)" required value="<?php echo $data['TELPSOPIR']; ?>">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. SIM</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="no_sim"  onKeyPress="return goodchars(event,'1234567890',this)" required value="<?php echo $data['NOSIM']; ?>">
                              </div>
                          </div>
                          
                          
                      <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tarif Per Jam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="tarif"  onKeyPress="return goodchars(event,'1234567890',this)" required value="<?php echo $data['TARIFPERJAMSOPIR']; ?>">
                              </div>
                          </div>
                     
                      
                <a button type="button" class="btn btn-primary" href="?page=guruview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td> 
           
        </tr>
                  </div>
                  
          		 </form>
          

      <!--main content end-->
