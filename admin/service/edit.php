<?php

$KODE = $_GET['kode'];
 if (isset($_POST['submit'])){
 
//tangkap data dari form
$id = $_POST['id_jenis_service'];
$plat = $_POST['plat'];
$tgl = $_POST['tgl_service'];
$biaya = $_POST['biaya'];
 
//update data di database sesuai nip
$query = mysql_query("update service set IDJENISSERVICE='$id', NOPLAT='$plat', TGLSERVICE='$tgl', BIAYASERVICE='$biaya' where KODESERVICE='$KODE'") or die(mysql_error());
 
if ($query) {
   echo "<script>window.location='?page=serviceview';</script>";
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
$query = mysql_query("select * from service where KODESERVICE='$KODE'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit Data</h4>
                      <form class="form-horizontal style-form" name="update_data" action="" method="post">
                      <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Service</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" type="text" name="kode" required readonly="readonly" value="<?php echo $data['KODESERVICE']; ?>" >
                              </div>
                          </div>
        
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Jenis Service</label>
                              <div class="col-sm-3">
                                 <select class="form-control" name="id_jenis_service">
          <option value="<?php echo $data ['IDJENISSERVICE']; ?>"><?php echo $data ['IDJENISSERVICE']; ?> </option>
          <?php $sql=mysql_query("select * from jenis_service") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['IDJENISSERVICE']; ?>"><?php echo $tmpwali['NMJenisService']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                          
                       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Plat</label>
                              <div class="col-sm-3">
                                 <select class="form-control" name="plat">
          <option value="<?php echo $data ['NOPLAT']; ?>"><?php echo $data ['NOPLAT']; ?> </option>
          <?php $sql=mysql_query("select * from service") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['NOPLAT']; ?>"><?php echo $tmpwali['NOPLAT']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>     
                          

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Service</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="date" name="tgl_service" value="<?php echo $data['TGLSERVICE']; ?>">
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Biaya Service</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="biaya"  required value="<?php echo $data['BIAYASERVICE']; ?>">
                              </div>
                          </div>
                     
                      
                <a button type="button" class="btn btn-primary" href="?page=serviceview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td> 
           
        </tr>
                  </div>
                  
          		 </form>
          

      <!--main content end-->
