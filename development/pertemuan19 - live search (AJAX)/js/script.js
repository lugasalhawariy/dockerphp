var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function(){

	//buat AJAX
	var ajax = new XMLHttpRequest();

	//cek kesiapan AJAX
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4 && ajax.status == 200){
			//pakai konsep DOM. ini di dalam container diganti dengan isi di dalam AJAX
			container.innerHTML = ajax.responseText;
		}	
	}

	//eksekusi AJAX
	//ambil file mahasiswa di folder ajax sambil kirim isi dari keyword dengan nilai true (true = wajib)
	ajax.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
	ajax.send();

});