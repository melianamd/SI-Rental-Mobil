<h3><p align="center">Jasa Persewaan Mobil</p></h3>
<h5><p align="center">jasa rental mobil terbaik di Indonesia. Kami
memberikan pelayanan terbaik untuk para kostumer
guna memberikan kenyamanan perjalanan.</p></h5>
<br/><br/>
  <?php
  include "db/koneksi.php";

			//tampil produk sewa
			$query = mysql_query("SELECT * FROM kendaraan ORDER BY NOPLAT desc LIMIT 0,8;");
			while($row=mysql_fetch_array($query)){
            ?>    

 <div class="product_box ">
            <img src="admin/images/produk/<?php echo $row['FOTO']; ?>" height="220px" width="220px">
                <h3>  <p class="product_price"><?php 
	  $kompsql = mysql_query ("SELECT * from type where IDTYPE= '$row[IDTYPE]'");
	  $r = mysql_fetch_array($kompsql);
	  echo $r['NMTYPE']; ?>
               </p></h3>
               <p align="center">Tarif Per Jam : <?php echo $row ['TARIFPERJAMKENDARAAN'] ?></p>
               <p align="center">Termasuk : Mobil+Sopir </p>
               <p align="center">Tahun Mobil : <?php echo $row ['TAHUN'] ?></p>
               <p align="center">Kapasitas : <?php echo $row ['KAPASITAS']?></p>
               
               <?php
			   if ($row['STATUSRENTAL']=='Tersedia'){
			   ?>
                <div align="center"><a href="?page=order&noplat=<?= $row['NOPLAT'] ?>" class="add_to_card">Sewa</a></div>
              <?php 
			   }else{
			   ?>
                <div align="center"><a href="#" class="add_to_card">
                Sedang Dipakai</a></div>
               <?php
			   }
			  ?>
            </div>  
            
     <?php
			}
			?>
            	
            
            