<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("data/menuutama.php")) die ("Empty Main Page!"); 
			include "data/menuutama.php";	break;
		

		case 'tentangkami' :				
			if(!file_exists ("data/tentang_kami.php")) die ("Sorry Empty Page!"); 
			include "data/tentang_kami.php";	break;		
		
		case 'testimoni' :				
			if(!file_exists ("data/testimoni.php")) die ("Sorry Empty Page!"); 
			include "data/testimoni.php";	break;		
		case 'hubungikami' :				
			if(!file_exists ("data/kontak.php")) die ("Sorry Empty Page!"); 
			include "data/kontak.php";	break;	
		case 'order' :				
			if(!file_exists ("data/order.php")) die ("Sorry Empty Page!"); 
			include "data/order.php";	break;
	
		
		case 'allberita' :				
			if(!file_exists ("all_berita.php")) die ("Sorry Empty Page!"); 
			include "all_berita.php";	break;		
		
		
		
		
							
		default:
			if(!file_exists ("user/artikel.php")) die ("Empty Main Page!"); 
			include "user/artikel.php";						
		break;
	}
}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("data/menuutama.php")) die ("Empty Main Page!"); 
	include "data/menuutama.php";	
}
?>