//eksekusi aplikasi ketika file sudah siap
//jadi file script bisa disimpan diatas selain sebelum body
$(document).ready(function(){
	//hilangkan tombol cari
	$('#tombol-cari').hide();

	$('#keyword').on('keyup', function(){
		//saat loading akan muncul gambar loader
		$('.loader').show();

		//ganti isi container dengan fungsi JQuery load()
		/*$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());*/

		//kalo ini fungsi JQuery dgn algoritma (ambil data baru jalankan fungsi berikut)
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
			//ganti halaman container dengan data yang sudah diambil tadi
			$('#container').html(data);
			//saat sudah diganti dan tampil, maka sembunyikan kembali gambar gif loader
			$('.loader').hide();
		});
	});
});