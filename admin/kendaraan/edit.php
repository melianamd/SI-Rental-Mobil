<?php

$PLAT = $_GET['plat'];
 if (isset($_POST['submit'])){
 
//tangkap data dari form
$plat = $_POST['plat'];
$id_type = $_POST['id_type'];
$pemilik = $_POST['pemilik'];
$tahun = $_POST['tahun'];
$tarif = $_POST['tarif'];
$stts_rental = $_POST['status_rental'];
$foto = $_POST['foto'];
$kapasitas = $_POST['kapasitas'];
 
//update data di database sesuai nip
$query = mysql_query("update kendaraan set NOPLAT='$plat', IDTYPE='$id_type', KODEPEMILIK='$pemilik', TAHUN='$tahun', TARIFPERJAMKENDARAAN='$tarif', STATUSRENTAL='$stts_rental', FOTO = '$foto', KAPASITAS='$kapasitas' where NOPLAT='$plat'") or die(mysql_error());
 
if ($query) {
   echo "<script>window.location='?page=kendaraanview';</script>";
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
$query = mysql_query("select * from kendaraan where NOPLAT='$PLAT'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit Data</h4>
                      <form class="form-horizontal style-form" name="update_data" action="" method="post">
                     
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Plat</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="plat" required onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ',this)" value="<?php echo $data['NOPLAT']; ?>">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Type</label>
                              <div class="col-sm-3">
                            <select class="form-control" name="id_type" >
          <option value="<?php echo $data ['IDTYPE']; ?>"><?php echo $data ['IDTYPE']; ?> </option>
          <?php $sql=mysql_query("select * from type") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['IDTYPE']; ?>"><?php echo $tmpwali['NMTYPE']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                              <div class="col-sm-3">
                               <select class="form-control" name="pemilik" >
          <option value="<?php echo $data ['KODEPEMILIK']; ?>"><?php echo $data ['KODEPEMILIK']; ?> </option>
          <?php $sql=mysql_query("select * from pemilik") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['KODEPEMILIK']; ?>"><?php echo $tmpwali['NMPEMILIK']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tahun</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="tahun" required  value="<?php echo $data['TAHUN']; ?>" onKeyPress="return goodchars(event,'1234567890 ',this)">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tarif Per Jam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="tarif"  onKeyPress="return goodchars(event,'1234567890',this)" required value="<?php echo $data['TARIFPERJAMKENDARAAN']; ?>">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status Rental</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" name="status_rental" required value="<?php echo $data['STATUSRENTAL']; ?>">
                              </div>
                          </div>
                     
                     
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="file" name="foto" value="<?php echo $data['FOTO']; ?>" required>
                              </div>
                          </div>
                          
                     
                     
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kapasitas</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="kapasitas" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890',this)" required value="<?php echo $data['KAPASITAS']; ?>">
                              </div>
                          </div>
                     
                      
                <a button type="button" class="btn btn-primary" href="?page=kendaraanview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td> 
           
        </tr>
                  </div>
                  
          		 </form>
          

      <!--main content end-->
