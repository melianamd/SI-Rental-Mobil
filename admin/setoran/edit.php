<?php

$NOSETORAN = $_GET['no'];
 if (isset($_POST['submit'])){
 
//tangkap data dari form
$nm_pemilik = $_POST['nm_pemilik'];
$nm_kry = $_POST['nm_karyawan'];
$tgl = $_POST['tanggal_setoran'];
$jumlah = $_POST['jumlah'];
 
//update data di database 
$query = mysql_query("update setoran set KODEPEMILIK='$nm_pemilik', NIK='$nm_kry', TGLSETORAN='$tgl', JUMLAH='$jumlah' where NOSETORAN='$NOSETORAN'") or die(mysql_error());
 
if ($query) {
   echo "<script>window.location='?page=setoranview';</script>";
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
$query = mysql_query("select * from setoran where NOSETORAN='$NOSETORAN'") or die(mysql_error());
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
                                  <input type="text" class="form-control" type="text" name="kode" required readonly="readonly" value="<?php echo $data['NOSETORAN']; ?>" >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                              <div class="col-sm-3">
                                       <select class="form-control" name="nm_pemilik" >
          <option value="<?php echo $data ['KODEPEMILIK']; ?>"><?php echo $data ['KODEPEMILIK']; ?> </option>
          <?php $sql=mysql_query("select * from pemilik") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['KODEPEMILIK']; ?>"><?php echo $tmpwali['NMPEMILIK']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Karyawan</label>
                              <div class="col-sm-3">
                                       <select class="form-control" name="nm_karyawan" >
          <option value="<?php echo $data ['NIK']; ?>"><?php echo $data ['NIK']; ?> </option>
          <?php $sql=mysql_query("select * from karyawan") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['NIK']; ?>"><?php echo $tmpwali['NMKARYAWAN']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Setoran</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="date" name="tanggal_setoran" required  value="<?php echo $data['TGLSETORAN']; ?>">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="jumlah"  onKeyPress="return goodchars(event,'1234567890',this)" required value="<?php echo $data['JUMLAH']; ?>">
                              </div>
                          </div>
                          
                      
                      
                <a button type="button" class="btn btn-primary" href="?page=setoranview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td> 
           
        </tr>
                  </div>
                  
          		 </form>
          

      <!--main content end-->
