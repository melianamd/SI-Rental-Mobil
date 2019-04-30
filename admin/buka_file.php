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

			
						# Karyawan
		case 'karyawanview' :				
			if(!file_exists ("karyawan/view.php")) die ("Sorry Empty Page!"); 
			include "karyawan/view.php";	break;			

		case 'karyawantambah' :				
			if(!file_exists ("karyawan/tambah.php")) die ("Sorry Empty Page!"); 
			include "karyawan/tambah.php"; break;
			
		case 'karyawanhapus' :				
			if(!file_exists ("karyawan/delete.php")) die ("Sorry Empty Page!"); 
			include "karyawan/delete.php"; break;
			
		case 'karyawanedit' :				
			if(!file_exists ("karyawan/edit.php")) die ("Sorry Empty Page!"); 
			include "karyawan/edit.php"; break;
			
			case 'karyawanlapor' :				
			if(!file_exists ("karyawan/lapor_karyawan.php")) die ("Sorry Empty Page!"); 
			include "karyawan/lapor_karyawan.php"; break;
			
						# Jenis Service
		case 'jenis_service_view' :				
			if(!file_exists ("jenis_service/view.php")) die ("Sorry Empty Page!"); 
			include "jenis_service/view.php";	break;			

		case 'jenis_service_tambah' :				
			if(!file_exists ("jenis_service/tambah.php")) die ("Sorry Empty Page!"); 
			include "jenis_service/tambah.php"; break;
			
		case 'jenis_service_hapus' :				
			if(!file_exists ("jenis_service/delete.php")) die ("Sorry Empty Page!"); 
			include "jenis_service/delete.php"; break;
			
		case 'jenis_service_edit' :				
			if(!file_exists ("jenis_service/edit.php")) die ("Sorry Empty Page!"); 
			include "jenis_service/edit.php"; break;
			
			case 'jenis_service_lapor' :				
			if(!file_exists ("jenis_service/lapor_jenis_service.php")) die ("Sorry Empty Page!"); 
			include "jenis_service/lapor_jenis_service.php"; break;
			
			
									# Kendaraan
		case 'kendaraanview' :				
			if(!file_exists ("kendaraan/view.php")) die ("Sorry Empty Page!"); 
			include "kendaraan/view.php";	break;			

		case 'kendaraantambah' :				
			if(!file_exists ("kendaraan/tambah.php")) die ("Sorry Empty Page!"); 
			include "kendaraan/tambah.php"; break;
			
		case 'kendaraanhapus' :				
			if(!file_exists ("kendaraan/delete.php")) die ("Sorry Empty Page!"); 
			include "kendaraan/delete.php"; break;
			
		case 'kendaraanedit' :				
			if(!file_exists ("kendaraan/edit.php")) die ("Sorry Empty Page!"); 
			include "kendaraan/edit.php"; break;
			
			case 'kendaraanlapor' :				
			if(!file_exists ("kendaraan/lapor_kendaraan.php")) die ("Sorry Empty Page!"); 
			include "kendaraan/lapor_kendaraan.php"; break;
			

									# Merk
		case 'merkview' :				
			if(!file_exists ("merk/view.php")) die ("Sorry Empty Page!"); 
			include "merk/view.php";	break;			

		case 'merktambah' :				
			if(!file_exists ("merk/tambah.php")) die ("Sorry Empty Page!"); 
			include "merk/tambah.php"; break;
			
		case 'merkhapus' :				
			if(!file_exists ("merk/delete.php")) die ("Sorry Empty Page!"); 
			include "merk/delete.php"; break;
			
		case 'merkedit' :				
			if(!file_exists ("merk/edit.php")) die ("Sorry Empty Page!"); 
			include "merk/edit.php"; break;
			
			case 'merklapor' :				
			if(!file_exists ("merk/lapor_merk.php")) die ("Sorry Empty Page!"); 
			include "merk/lapor_merk.php"; break;
			
			
									# Pelanggan
		case 'pelangganview' :				
			if(!file_exists ("pelanggan/view.php")) die ("Sorry Empty Page!"); 
			include "pelanggan/view.php";	break;			

		case 'pelanggantambah' :				
			if(!file_exists ("pelanggan/tambah.php")) die ("Sorry Empty Page!"); 
			include "pelanggan/tambah.php"; break;
			
		case 'pelangganhapus' :				
			if(!file_exists ("pelanggan/delete.php")) die ("Sorry Empty Page!"); 
			include "pelanggan/delete.php"; break;
			
		case 'pelangganedit' :				
			if(!file_exists ("pelanggan/edit.php")) die ("Sorry Empty Page!"); 
			include "pelanggan/edit.php"; break;
			
			case 'pelangganlapor' :				
			if(!file_exists ("pelanggan/lapor_pelanggan.php")) die ("Sorry Empty Page!"); 
			include "pelanggan/lapor_pelanggan.php"; break;
			
			
									# Pemilik
		case 'pemilikview' :				
			if(!file_exists ("pemilik/view.php")) die ("Sorry Empty Page!"); 
			include "pemilik/view.php";	break;			

		case 'pemiliktambah' :				
			if(!file_exists ("pemilik/tambah.php")) die ("Sorry Empty Page!"); 
			include "pemilik/tambah.php"; break;
			
		case 'pemilikhapus' :				
			if(!file_exists ("pemilik/delete.php")) die ("Sorry Empty Page!"); 
			include "pemilik/delete.php"; break;
			
		case 'pemilikedit' :				
			if(!file_exists ("pemilik/edit.php")) die ("Sorry Empty Page!"); 
			include "pemilik/edit.php"; break;
			
			case 'pemiliklapor' :				
			if(!file_exists ("pemilik/lapor_pemilik.php")) die ("Sorry Empty Page!"); 
			include "pemilik/lapor_pemilik.php"; break;		
			
			
												# Service
		case 'serviceview' :				
			if(!file_exists ("service/view.php")) die ("Sorry Empty Page!"); 
			include "service/view.php";	break;			

		case 'servicetambah' :				
			if(!file_exists ("service/tambah.php")) die ("Sorry Empty Page!"); 
			include "service/tambah.php"; break;
			
		case 'servicehapus' :				
			if(!file_exists ("service/delete.php")) die ("Sorry Empty Page!"); 
			include "service/delete.php"; break;
			
		case 'serviceedit' :				
			if(!file_exists ("service/edit.php")) die ("Sorry Empty Page!"); 
			include "service/edit.php"; break;
			
			case 'servicelapor' :				
			if(!file_exists ("service/lapor_service.php")) die ("Sorry Empty Page!"); 
			include "service/lapor_service.php"; break;		
		
		
											# Setoran
		case 'setoranview' :				
			if(!file_exists ("setoran/view.php")) die ("Sorry Empty Page!"); 
			include "setoran/view.php";	break;			

		case 'setorantambah' :				
			if(!file_exists ("setoran/tambah.php")) die ("Sorry Empty Page!"); 
			include "setoran/tambah.php"; break;
			
		case 'setoranhapus' :				
			if(!file_exists ("setoran/delete.php")) die ("Sorry Empty Page!"); 
			include "setoran/delete.php"; break;
			
		case 'setoranedit' :				
			if(!file_exists ("setoran/edit.php")) die ("Sorry Empty Page!"); 
			include "setoran/edit.php"; break;
			
			case 'setoranlapor' :				
			if(!file_exists ("setoran/lapor_setoran.php")) die ("Sorry Empty Page!"); 
			include "setoran/lapor_setoran.php"; break;
			
			
			# Sopir
		case 'sopirview' :				
			if(!file_exists ("sopir/view.php")) die ("Sorry Empty Page!"); 
			include "sopir/view.php";	break;			

		case 'sopirtambah' :				
			if(!file_exists ("sopir/tambah.php")) die ("Sorry Empty Page!"); 
			include "sopir/tambah.php"; break;
			
		case 'sopirhapus' :				
			if(!file_exists ("sopir/delete.php")) die ("Sorry Empty Page!"); 
			include "sopir/delete.php"; break;
			
		case 'sopiredit' :				
			if(!file_exists ("sopir/edit.php")) die ("Sorry Empty Page!"); 
			include "sopir/edit.php"; break;
			
			case 'sopirlapor' :				
			if(!file_exists ("sopir/lapor_sopir.php")) die ("Sorry Empty Page!"); 
			include "sopir/lapor_sopir.php"; break;
			
			
						# Type
		case 'typeview' :				
			if(!file_exists ("type/view.php")) die ("Sorry Empty Page!"); 
			include "type/view.php";	break;			

		case 'typetambah' :				
			if(!file_exists ("type/tambah.php")) die ("Sorry Empty Page!"); 
			include "type/tambah.php"; break;
			
		case 'typehapus' :				
			if(!file_exists ("type/delete.php")) die ("Sorry Empty Page!"); 
			include "type/delete.php"; break;
			
		case 'typeedit' :				
			if(!file_exists ("type/edit.php")) die ("Sorry Empty Page!"); 
			include "type/edit.php"; break;
			
			case 'typelapor' :				
			if(!file_exists ("type/lapor_type.php")) die ("Sorry Empty Page!"); 
			include "type/lapor_type.php"; break;
			
			
			# Transaksi Sewa
		case 't_sewaview' :				
			if(!file_exists ("transaksi_sewa/view.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/view.php";	break;			

		case 't_sewatambah' :				
			if(!file_exists ("transaksi_sewa/tambah.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/tambah.php"; break;
			
		case 't_sewahapus' :				
			if(!file_exists ("transaksi_sewa/delete.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/delete.php"; break;
			
		case 't_sewaedit' :				
			if(!file_exists ("transaksi_sewa/edit.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/edit.php"; break;
			
			case 't_sewalapor' :				
			if(!file_exists ("transaksi_sewa/lapor_t_sewa.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/lapor_t_sewa.php"; break;
	
	case 't_sewastruk' :				
			if(!file_exists ("transaksi_sewa/struk.php")) die ("Sorry Empty Page!"); 
			include "transaksi_sewa/struk.php"; break;
			
			
			
			
			
			
			
			
			
			
			
			
			
			
							
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