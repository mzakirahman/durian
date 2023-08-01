/*
 Database
*/
- pm_kriteria => join dengan table sub_kriteria;
- pm_sub_kriteria => sub kriteria dari setiap data kriteria; Join/relasi dengan table pm_kriteria, pm_value_set,m_pemetaan_gap, dan m_value_data_uji;
- pm_value_set => table untuk menampung nilai dari setiap sub_kriteria; Join dengan table sub_kriteria;
- pm_pembobotan => table untuk menampung nilai selisih dan bobot dari setiap nilai selisih;
- m_data_uji_aly => table untuk menampung nama data uji/pestisida yang ada; Join dengan table m_value_data_uji, m_detail_pestisida, dan m_nilai_akhir;
- m_value_data_uji => table untuk menampung nilai dari data uji berdasarkan tiap subKriteria; Join dengan table m_data_uji_alt dan sub kriteria;
- m_hitung => table untuk menyimpan nilai inputan pengguna; join dengan table m_hitung_selisih, m_hitung_gap, m_core_faktor, m_secondary_faktor, m_nilai_akhir, m_nilai_total;
- m_hitung_selisih => table untuk menampung nilai selisih dari value data uji; join dengan table m_hitung;
- m_hitung_gap => table untuk menampung nilai gap dari selisih yang telah di simpan di table m_hitung_selisih; join table m_hitung dan pm_sub_kriteria;
- m_secondary_faktor dan m_core_faktor => table untuk menyimpan hasil akumulasi dari sub kriteria masing-masing kriteria berdasarkan jenis faktornya; join table m_hitung;
- m_nilai_total => table untuk menampung nilai total dari core faktor dan secondary faktor masing-masing sub kriteria;
- m_nilai_akhir => table untuk menyimpan nilai akumulasi dari setiap sub kriteria;
- m_detail_pestisida => table untuk menyimpan penjelasan tentang pestisida atau data uji alternatif yang ada;
- m_hama =>table untuk menampung data hama padi;

/*
 CRUD 
*/
- Setiap halaman selain halaman hitung, memiliki cara kerja yang sama, dimana untuk data di get dari controller di fungsi index; 
- Untuk input dan edit data meggunakan modal yang sama, perbedaannya pada edit data menggunakan ajax jquery untuk menampilkan data pada form; fungsi ajax terletak pada bagian bawah setiap halaman;

/*
 Akses
*/
- halaman yang dapat diakses tanpan perlu login => hitung, daftar hama, login dan register;
- selain itu perlu login untuk mengaksesnya;
