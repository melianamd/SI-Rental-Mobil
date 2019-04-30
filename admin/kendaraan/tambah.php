<?php
 if (isset($_POST['submit'])){
	 
//tangkap data dari form
$plat = $_POST['plat'];
$id_type = $_POST['id_type'];
$pemilik = $_POST['pemilik'];
$tahun = $_POST['tahun'];
$tarif = $_POST['tarif'];
$stts_rental = $_POST['status_rental'];

$foto = $_FILES['FOTO']['name']; //D
move_uploaded_file($_FILES['FOTO']['tmp_name'],"images/produk/".$foto);

$kapasitas = $_POST['kapasitas'];
 
//simpan data ke database
$query = mysql_query("insert into kendaraan (NOPLAT,IDTYPE,KODEPEMILIK,TAHUN,TARIFPERJAMKENDARAAN,STATUSRENTAL,FOTO,KAPASITAS) values('$plat','$id_type', '$pemilik', '$tahun', '$tarif', '$stts_rental','$foto','$kapasitas')") or die(mysql_error());
 
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


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Input Data</h4>
                      <form class="form-horizontal style-form" name="input_data" action="" method="post" enctype="multipart/form-data">
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Plat</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="plat" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890 ',this)" required>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Type</label>
                              <div class="col-sm-3">
                                <select class="form-control" name="id_type">
          <?php $sql=mysql_query("select * from type") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['IDTYPE']; ?>"><?php echo $tmpwali['NMTYPE']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                              <div class="col-sm-3">
                                  <select class="form-control" name="pemilik">
          <?php $sql=mysql_query("select * from pemilik") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['KODEPEMILIK']; ?>"><?php echo $tmpwali['NMPEMILIK']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tahun</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="tahun" onKeyPress="return goodchars(event,'1234567890- ',this)" required >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tarif Per Jam</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="tarif" onKeyPress="return goodchars(event,'1234567890.  ',this)" required >
                              </div>
                          </div>
                          
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Status Rental</label>
                              <div class="col-sm-3">
    <input type="radio" name="status_rental" value="Tersedia"  />Tersedia
    <input type="radio" name="status_rental" value="Tidak Tersedia"  />Tidak Tersedia<br />
                              </div>
                          </div>
                          
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="file" name="FOTO"  required>
                              </div>
                          </div>
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kapsitas</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="kapasitas" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890',this)" required>
                              </div>
                          </div>
                          
                      <a button type="button" class="btn btn-primary" href="?page=kendaraanview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td>
        </tr>
                  </div>
                  
          		
          

      <!--main content end-->
</form>