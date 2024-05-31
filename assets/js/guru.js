/**
 * Fungsi untuk menghapus data guru berdasarkan ID menggunakan AJAX.
 * @param {number} id - ID guru yang akan dihapus.
 */
function hapus_guru(id) {
	$.ajax({
		url: base_url + "guru/delete/" + id, // URL endpoint untuk menghapus data guru
		type: "POST", // Metode HTTP yang digunakan (POST)
		dataType: "JSON", // Tipe data yang diharapkan dari respons server (JSON)
		success: function (data) {
			// Callback jika permintaan berhasil
			location.reload(); // Muat ulang halaman setelah menghapus data
		},
		error: function (jqXHR, textStatus, errorThrown) {
			// Callback jika terjadi kesalahan
			location.reload(); // Tampilkan pesan kesalahan
		},
	});
}
