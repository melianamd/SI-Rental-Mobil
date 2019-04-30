<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";	break;	
		case 'home' :				
			if(!file_exists ("home.php")) die ("Empty Main Page!"); 
			include "home.php";	break;	

			
			
			# Transaksi Pesan
		case 't_pesanview' :				
			if(!file_exists ("transaksi_pesan/view.php")) die ("Sorry Empty Page!"); 
			include "transaksi_pesan/view.php";	break;
			
		case 't_pesanedit' :				
			if(!file_exists ("transaksi_pesan/edit.php")) die ("Sorry Empty Page!"); 
			include "transaksi_pesan/edit.php";	break;			
			
		case 't_pesanhapus' :				
			if(!file_exists ("transaksi_pesan/delete.php")) die ("Sorry Empty Page!"); 
			include "transaksi_pesan/delete.php"; break;
			
			
			# Transaksi Sewa
		case 't_sewaview' :				
			if(!file_exists ("transaksi_sewa/view.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/view.php";	break;
			
		case 't_sewaedit' :				
			if(!file_exists ("transaksi_sewa/edit.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/edit.php";	break;			
			
		case 't_sewahapus' :				
			if(!file_exists ("transaksi_sewa/delete.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/delete.php"; break;
			
			
			# Transaksi Kembali
		case 't_kembaliview' :				
			if(!file_exists ("transaksi_kembali/view.php")) die ("Sorry Empty Page!"); 
			include "transaksi_kembali/view.php";	break;
			
		case 'struk' :				
			if(!file_exists ("transaksi_kembali/cetak_struk.php")) die ("Sorry Empty Page!"); 
			include "transaksi_kembali/cetak_struk.php";	break;			
			
		case 'cetak' :				
			if(!file_exists ("transaksi_kembali/cetak.php")) die ("Sorry Empty Page!"); 
			include "transaksi_kembali/cetak.php";	break;			
	
			
			# Transaksi Service
			case 't_serviceview' :				
			if(!file_exists ("transaksi_service/view.php")) die ("Sorry Empty Page!"); 
			include "transaksi_service/view.php";	break;
			
			case 'struk_service' :				
			if(!file_exists ("transaksi_service/cetak_struk.php")) die ("Sorry Empty Page!"); 
			include "transaksi_service/cetak_struk.php";	break;
			
			case 'cetak' :				
			if(!file_exists ("transaksi_service/cetak.php")) die ("Sorry Empty Page!"); 
			include "transaksi_service/cetak.php";	break;	
			
			
			# Transaksi Setoran
			case 'setoranview' :				
			if(!file_exists ("transaksi_setoran/view.php")) die ("Sorry Empty Page!"); 
			include "transaksi_setoran/view.php";	break;
			
			case 'setorankirim' :				
			if(!file_exists ("transaksi_setoran/in_setoran.php")) die ("Sorry Empty Page!"); 
			include "transaksi_setoran/in_setoran.php";	break;
			
			case 'setoranrekap' :				
			if(!file_exists ("transaksi_setoran/setoranrekap.php")) die ("Sorry Empty Page!"); 
			include "transaksi_setoran/setoranrekap.php";	break;	
			
			
			
			
			
			
			
			
			
							
		default:
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";						
		break;
	}
}
else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("main.php")) die ("Empty Main Page!"); 
	include "main.php";	
}
?>