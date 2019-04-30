<?php

$ID = $_GET['id'];
 if (isset($_POST['submit'])){
 
//tangkap data dari form
$nama= $_POST['nama_js'];
 
//update data di database sesuai nip
$query = mysql_query("update jenis_service set NMJenisService='$nama' where IDJENISSERVICE='$ID'") or die(mysql_error());
 
if ($query) {
   echo "<script>window.location='?page=jenis_service_view';</script>";
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
$query = mysql_query("select * from jenis_service where IDJENISSERVICE='$ID'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit Data</h4>
                      <form class="form-horizontal style-form" name="update_data" action="" method="post">
                      <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Jenis Service</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" type="text" name="id" required readonly="readonly" value="<?php echo $data['IDJENISSERVICE']; ?>" >
                              </div>
                          </div>
                          
                          
                          
                       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Jenis Service</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="nama_js" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" required value="<?php echo $data['NMJenisService']; ?>">
                              </div>
                          </div>
                     
                      
                <a button type="button" class="btn btn-primary" href="?page=jenis_service_view">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td> 
           
        </tr>
                  </div>
                  
          		 </form>
          

      <!--main content end-->
