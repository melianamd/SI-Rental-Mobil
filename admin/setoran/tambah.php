<?php

$kode		= buatKode("setoran","STR");
 if (isset($_POST['submit'])){
	 
//tangkap data dari form
$nm_pemilik = $_POST['nm_pemilik'];
$nm_kry = $_POST['nm_karyawan'];
$tgl = $_POST['tanggal_setoran'];
$jumlah = $_POST['jumlah'];

 
//simpan data ke database
$query = mysql_query("insert into setoran (NOSETORAN,KODEPEMILIK,NIK,TGLSETORAN,JUMLAH) values('$kode','$nm_pemilik','$nm_kry', '$tgl', '$jumlah')") or die(mysql_error());
 
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


  <!--main content start-->
     
          	
          	<!-- BASIC FORM ELELEMNTS -->
        
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Form Input Data</h4>
                      <form class="form-horizontal style-form" name="input_data" action="" method="post">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No. Setoran</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" name="kode" value="<?php echo $kode ?>"  readonly="readonly">
                              </div>
                          </div>
                          
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik</label>
                              <div class="col-sm-3">
                                  <select class="form-control" name="nm_pemilik">
          <?php $sql=mysql_query("select * from pemilik") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['KODEPEMILIK']; ?>"><?php echo $tmpwali['NMPEMILIK']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                          
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Karyawan</label>
                              <div class="col-sm-3">
                                  <select class="form-control" name="nm_karyawan">
          <?php $sql=mysql_query("select * from karyawan") or die (mysql_error()); while($tmpwali=mysql_fetch_array($sql)){?>
          <option value="<?php echo $tmpwali['NIK']; ?>"><?php echo $tmpwali['NMKARYAWAN']; ?></option>
          <?php } ?>
      </select>
                              </div>
                          </div>
                          
                             
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Setoran</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="date" name="tanggal_setoran" required >
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                              <div class="col-sm-3">
                                  <input class="form-control" type="text" name="jumlah" onKeyPress="return goodchars(event,'1234567890',this)" required>
                              </div>
                          </div>
                      <a button type="button" class="btn btn-primary" href="?page=setoranview">Lihat Data</a>
                       <tr>
            <td><input class="btn btn-primary" type="submit" name="submit" value="Simpan" /></td>
        </tr>
                  </div>
                  
          		
          

      <!--main content end-->
</form>