<?php
class M_admin extends CI_Model
{
    //dashboard
    public function jm_art()
    {
        $data_barang = "SELECT * FROM artikel";
        return $this->db->query($data_barang)->num_rows();
    }
    public function jm_dk()
    {
        $data_produk = "SELECT * FROM dokter";
        return $this->db->query($data_produk)->num_rows();
    }
    public function jm_g()
    {
        $data_barang = "SELECT * FROM galeri";
        return $this->db->query($data_barang)->num_rows();
    }
    public function jm_ko()
    {
        $data_produk = "SELECT * FROM kategori_obat";
        return $this->db->query($data_produk)->num_rows();
    }
    public function jm_t()
    {
        $data_barang = "SELECT * FROM labotarium";
        return $this->db->query($data_barang)->num_rows();
    }
    public function jm_l()
    {
        $data_produk = "SELECT * FROM layanan";
        return $this->db->query($data_produk)->num_rows();
    }
    public function jm_o()
    {
        $data_produk = "SELECT * FROM obat";
        return $this->db->query($data_produk)->num_rows();
    }
    public function getTestTgl()
    {
        $query = "SELECT * FROM `janji_labo` INNER JOIN labotarium WHERE janji_labo.status = 'proses' AND janji_labo.id_test = labotarium.id";
        return $this->db->query($query)->result_array();
    }

    //janji test
    public function getAllDataJanji()
    {
        $query = "SELECT * FROM `janji_labo` JOIN labotarium on labotarium.id = janji_labo.id_test WHERE janji_labo.status = 'done' OR janji_labo.status = 'proses' ORDER BY janji_labo.id_janji DESC
        ";
        return $this->db->query($query)->result_array();
    }
    public function getAllDataTolak()
    {
        $query = "SELECT * FROM `janji_labo` INNER JOIN labotarium ON labotarium.id = janji_labo.id_test AND status = 'tolak' ORDER BY janji_labo.id_janji DESC
        ";
        return $this->db->query($query)->result_array();
    }
    public function getAllDataSelesai()
    {
        $query = "SELECT * FROM `janji_labo` INNER JOIN labotarium ON labotarium.id = janji_labo.id_test AND status = 'selesai' ORDER BY janji_labo.id_janji DESC
        ";
        return $this->db->query($query)->result_array();
    }
    public function getAllJanjiByid($id)
    {
        return $this->db->query("SELECT * FROM `janji_labo` INNER JOIN labotarium ON labotarium.id = janji_labo.id_test WHERE janji_labo.id_janji = '$id'
        ")->row_array();
    }
    public function konfirmasi()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $jam_datang = $this->input->post('jam_datang');
        $jam_akhir = $this->input->post('jam_akhir');
        $date = $this->input->post('date');
        $this->db->where('id_janji', $id);
        $this->db->update('janji_labo', ['status' => $status, 'date' => $date, 'jam_datang' => $jam_datang, 'jam_akhir' => $jam_akhir]);
    }
    public function tolak($id)
    {
        $status = "tolak";
        $this->db->where('id_janji', $id);
        $this->db->update('janji_labo', ['status' => $status]);
    }

    public function hapusJanji($id)
    {
        $this->db->where('id_janji', $id);
        $this->db->delete('janji_labo');
    }
    public function selesai_janji($id)
    {
        $status = 'selesai';
        $this->db->where('id_janji', $id);
        $this->db->update('janji_labo', ['status' => $status]);
    }



    //artikel
    public function getAllArtikel()
    {
        $this->db->order_by('id_artikel', 'DESC');
        return $this->db->get('artikel')->result_array();
    }
    public function createArtikel()
    {
        if (!empty($_FILES['img_artikel']['name'])) {
            $img_artikel = $this->uploadArtikel();
            $data['img_artikel'] = $img_artikel;
        }

        $slug = url_title($this->input->post('judul_artikel'), 'dash', TRUE);

        $data = array(
            'judul_artikel' => $this->input->post('judul_artikel'),
            'slug' => $slug,
            'isi_artikel' => $this->input->post('isi_artikel'),
            'tgl_artikel' => $this->input->post('tgl_artikel'),
            'img_artikel' => $img_artikel,
            'id_user' => $this->input->post('id_user'),
        );
        $this->db->insert('artikel', $data);
    }

    public function getArtikelById($id)
    {
        return $this->db->get_where('artikel', ['id_artikel' => $id])->row_array();
    }
    public function updateArtikel()
    {
        $id = $this->input->post('id_artikel');

        if (!empty($_FILES["img_artikel"]["name"])) {
            $img_artikel = $this->uploadArtikel();
            $data['img_artikel'] = $img_artikel;
        } else {
            $img_artikel = $this->input->post('old_img_artikel');
            $data['img_artikel'] = $img_artikel;
        }
        $slug = url_title($this->input->post('judul_artikel'), 'dash', TRUE);

        $data = array(
            'judul_artikel' => $this->input->post('judul_artikel'),
            'slug' => $slug,
            'isi_artikel' => $this->input->post('isi_artikel'),
            'tgl_artikel' => $this->input->post('tgl_artikel'),
            'img_artikel' => $img_artikel,
            'id_user' => $this->input->post('id_user'),
        );
        $this->db->where('id_artikel', $id);
        $this->db->update('artikel', $data);
    }
    public function deleteArtikel($id)
    {
        $this->db->where('id_artikel', $id);
        $this->db->delete('artikel');
    }

    //dokter
    public function getAllDokter()
    {
        $this->db->order_by('id_dokter', 'DESC');
        return $this->db->get('dokter')->result_array();
    }
    public function createDokter()
    {
        if (!empty($_FILES['image_dokter']['name'])) {
            $image_dokter = $this->uploadDokter();
            $data['image_dokter'] = $image_dokter;
        }
        $slug = url_title($this->input->post('nama_dokter'), 'dash', TRUE);
        $data = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'slug' => $slug,
            'spesialis' => $this->input->post('spesialis'),
            'tempat' => $this->input->post('tempat'),
            'informasi_dokter' => $this->input->post('informasi_dokter'),
            'jam_operasional' => $this->input->post('jam_operasional'),
            'image_dokter' => $image_dokter,
        );
        $this->db->insert('dokter', $data);
    }
    public function getDokterById($id)
    {
        return $this->db->get_where('dokter', ['id_dokter' => $id])->row_array();
    }
    public function updateDokter()
    {
        $id = $this->input->post('id_dokter');
        if (!empty($_FILES["image_dokter"]["name"])) {
            $image_dokter = $this->uploadDokter();
            $data['image_dokter'] = $image_dokter;
        } else {
            $image_dokter = $this->input->post('old_image_dokter');
            $data['image_dokter'] = $image_dokter;
        }
        $slug = url_title($this->input->post('nama_dokter'), 'dash', TRUE);
        $data = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'slug' => $slug,
            'spesialis' => $this->input->post('spesialis'),
            'tempat' => $this->input->post('tempat'),
            'informasi_dokter' => $this->input->post('informasi_dokter'),
            'jam_operasional' => $this->input->post('jam_operasional'),
            'image_dokter' => $image_dokter,
        );
        $this->db->where('id_dokter', $id);
        $this->db->update('dokter', $data);
    }
    public function deleteDokter($id)
    {
        $this->db->where('id_dokter', $id);
        $this->db->delete('dokter');
    }

    //galeri
    public function getAllGaleri()
    {
        $this->db->order_by('id_galeri', 'DESC');
        return $this->db->get('galeri')->result_array();
    }
    public function createGaleri()
    {
        if (!empty($_FILES["image"]["name"])) {
            $image = $this->uploadGaleri();
            $data['image'] = $image;
        }
        $this->db->insert('galeri', $data);
    }
    public function deleteGaleri($id)
    {
        $this->db->where('id_galeri', $id);
        $this->db->delete('galeri');
    }
    public function getByIdGaleri($id)
    {
        return $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();
    }

    //kategori
    public function getAllkategori()
    {
        $this->db->order_by('id_kategori', 'DESC');
        return $this->db->get('kategori_obat')->result_array();
    }
    public function createKategori()
    {
        if (!empty($_FILES["image_kategori"]["name"])) {
            $image_kategori = $this->uploadKategori();
            $data['image_kategori'] = $image_kategori;
        }
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'image_kategori' => $image_kategori,
        );
        $this->db->insert('kategori_obat', $data);
    }
    public function getKAtegoriById($id)
    {
        return $this->db->get_where('kategori_obat', ['id_kategori' => $id])->row_array();
    }
    public function updateKategori()
    {
        $id = $this->input->post('id_kategori');
        if (!empty($_FILES["image_kategori"]["name"])) {
            $image_kategori = $this->uploadKategori();
            $data['image_kategori'] = $image_kategori;
        } else {
            $image_kategori = $this->input->post('old_image_kategori');
            $data['image_kategori'] = $image_kategori;
        }
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'image_kategori' => $image_kategori,
        );
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori_obat', $data);
    }
    public function deleteKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori_obat');
    }


    //test
    public function getAlltest()
    {
        return $this->db->query("SELECT * FROM `labotarium` INNER JOIN kategori_labo ON kategori_labo.id_kategori = labotarium.id_kategori ORDER BY labotarium.id DESC")->result_array();
    }
    public function getTestById($id)
    {
        return $this->db->query("SELECT * FROM `labotarium` INNER JOIN kategori_labo ON kategori_labo.id_kategori = labotarium.id_kategori WHERE labotarium.id = '$id'")->row_array();
    }
    public function createTest()
    {
        $slug = url_title($this->input->post('nama'), 'dash', TRUE);

        $data = array(
            'nama' => $this->input->post('nama'),
            'detail' => $this->input->post('detail'),
            'slug' => $slug,
            'id_kategori' => $this->input->post('id_kategori'),
            'type' => $this->input->post('type')
        );
        $this->db->insert('labotarium', $data);
    }

    public function updateTest()
    {
        $id = $this->input->post('id');
        $slug = url_title($this->input->post('nama'), 'dash', TRUE);

        $data = array(
            'nama' => $this->input->post('nama'),
            'detail' => $this->input->post('detail'),
            'slug' => $slug,
            'id_kategori' => $this->input->post('id_kategori'),
            'type' => $this->input->post('type')
        );

        $this->db->where('id', $id);
        $this->db->update('labotarium', $data);
    }

    public function deleteTest($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('labotarium');
    }

    //kategori test
    public function getAllKTtest()
    {
        $this->db->order_by('id_kategori', 'DESC');
        return $this->db->get('kategori_labo')->result_array();
    }
    public function getKTbyID($id)
    {
        return $this->db->get_where('kategori_labo', ['id_kategori' => $id])->row_array();
    }
    public function insertKT()
    {
        $slug = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'slug' => $slug
        );
        $this->db->insert('kategori_labo', $data);
    }
    public function updateKT()
    {
        $id = $this->input->post('id_kategori');
        $slug = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'slug' => $slug
        );
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori_labo', $data);
    }
    public function deleteKT($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori_labo');
    }


    // //layanan
    // public function getAlllayanan()
    // {
    //     $this->db->order_by('id', 'DESC');
    //     return $this->db->get('layanan')->result_array();
    // }
    // public function createLayanan()
    // {
    //     $data = array(
    //         'judul' => $this->input->post('judul'),
    //         'isi' => $this->input->post('isi'),
    //         'link' => $this->input->post('link'),
    //         'icon' => $this->input->post('icon')
    //     );
    //     $this->db->insert('layanan', $data);
    // }
    // public function getLayananById($id)
    // {
    //     return $this->db->get_where('layanan', ['id' => $id])->row_array();
    // }
    // public function updateLayanan()
    // {
    //     $id = $this->input->post('id');
    //     $data = array(
    //         'judul' => $this->input->post('judul'),
    //         'isi' => $this->input->post('isi'),
    //         'link' => $this->input->post('link'),
    //         'icon' => $this->input->post('icon')
    //     );
    //     $this->db->where('id', $id);
    //     $this->db->update('layanan', $data);
    // }
    // public function deleteLayanan($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('layanan');
    // }

    //obat
    public function getAllobat()
    {
        return $this->db->query("SELECT * FROM `obat` INNER JOIN kategori_obat ON kategori_obat.id_kategori = obat.id_kategori ORDER BY obat.id_obat DESC
        ")->result_array();
    }
    public function getAllobatId($id)
    {
        return $this->db->query("SELECT * FROM `obat` INNER JOIN kategori_obat ON kategori_obat.id_kategori = obat.id_kategori WHERE obat.id_obat = $id
        ")->row_array();
    }
    public function createObat()
    {
        if (!empty($_FILES["image_obat"]["name"])) {
            $image_obat = $this->uploadObat();
            $data['image_obat'] = $image_obat;
        }
        $slug = url_title($this->input->post('nama_obat'), 'dash', TRUE);
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_obat' => $this->input->post('nama_obat'),
            'slug' => $slug,
            'satuan' => $this->input->post('satuan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'indeksi_umum' => $this->input->post('indeksi_umum'),
            'komposisi' => $this->input->post('komposisi'),
            'dosis' => $this->input->post('dosis'),
            'aturan_pakai' => $this->input->post('aturan_pakai'),
            'kontra_indikasi' => $this->input->post('kontra_indikasi'),
            'perhatian' => $this->input->post('perhatian'),
            'efek_samping' => $this->input->post('efek_samping'),
            'segmentasi' => $this->input->post('segmentasi'),
            'kemasan' => $this->input->post('kemasan'),
            'manufaktur' => $this->input->post('manufaktur'),
            'no_registrasi' => $this->input->post('no_registrasi'),
            'image_obat' => $image_obat
        );
        $this->db->insert('obat', $data);
    }
    public function updateObat()
    {
        $id = $this->input->post('id_obat');
        if (!empty($_FILES["image_obat"]["name"])) {
            $image_obat = $this->uploadObat();
            $data['image_obat'] = $image_obat;
        } else {
            $image_obat = $this->input->post('old_image_obat');
            $data['image_obat'] = $image_obat;
        }
        $slug = url_title($this->input->post('nama_obat'), 'dash', TRUE);
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_obat' => $this->input->post('nama_obat'),
            'slug' => $slug,
            'satuan' => $this->input->post('satuan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'indeksi_umum' => $this->input->post('indeksi_umum'),
            'komposisi' => $this->input->post('komposisi'),
            'dosis' => $this->input->post('dosis'),
            'aturan_pakai' => $this->input->post('aturan_pakai'),
            'kontra_indikasi' => $this->input->post('kontra_indikasi'),
            'perhatian' => $this->input->post('perhatian'),
            'efek_samping' => $this->input->post('efek_samping'),
            'segmentasi' => $this->input->post('segmentasi'),
            'kemasan' => $this->input->post('kemasan'),
            'manufaktur' => $this->input->post('manufaktur'),
            'no_registrasi' => $this->input->post('no_registrasi'),
            'image_obat' => $image_obat
        );
        $this->db->where('id_obat', $id);
        $this->db->update('obat', $data);
    }
    public function deleteObat($id)
    {
        $this->db->where('id_obat', $id);
        $this->db->delete('obat');
    }

    //user
    public function getAllUser()
    {
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('user')->result_array();
    }
    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    //Upload Foto All

    //foto artikel
    private function uploadArtikel()
    {
        $img_artikel_name = rand(1, 1000) . '-' . $_FILES["img_artikel"]['name'];

        $config['upload_path']         = 'assets/img/artikel/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']         = 5000;
        $config['max_width']            = 1152;
        $config['max_height']           = 1152;
        $config['file_name']         = $img_artikel_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img_artikel')) {
            if (strpos($this->upload->display_errors('', ''), "larger than the permitted") !== false) {
                $this->session->set_flashdata('error', "Ukuran melebihi 5mb");
            } else if (strpos($this->upload->display_errors('', ''), "doesn't fit into the allowed dimensions") !== false) {
                $this->session->set_flashdata('error', "Ukuran width dan height melebihi batas yang di tentukan Width 1152px dan Height 768px");
            } else if (strpos($this->upload->display_errors('', ''), "The filetype you are attempting to upload is not allowed") !== false) {
                $this->session->set_flashdata('error', "Format Gambar Harus PNG Atau JPG");
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            }
            redirect('admin/artikel');
        }
        return $this->upload->data('file_name');
    }

    //foto Dokter
    private function uploadDokter()
    {
        $image_dokter_name = rand(1, 1000) . '-' . $_FILES["image_dokter"]['name'];

        $config['upload_path']         = 'assets/img/doctors/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']         = 10000;
        $config['max_width']            = 1152;
        $config['max_height']           = 1152;
        $config['file_name']         = $image_dokter_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image_dokter')) {
            if (strpos($this->upload->display_errors('', ''), "larger than the permitted") !== false) {
                $this->session->set_flashdata('error', "Ukuran melebihi 5mb");
            } else if (strpos($this->upload->display_errors('', ''), "doesn't fit into the allowed dimensions") !== false) {
                $this->session->set_flashdata('error', "Ukuran width dan height melebihi batas yang di tentukan Width 1152px dan Height 768px");
            } else if (strpos($this->upload->display_errors('', ''), "The filetype you are attempting to upload is not allowed") !== false) {
                $this->session->set_flashdata('error', "Format Gambar Harus PNG Atau JPG");
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            }
            redirect('admin/dokter');
        }
        return $this->upload->data('file_name');
    }
    //foto Galeri
    private function uploadGaleri()
    {
        $image_name = rand(1, 1000) . '-' . $_FILES["image"]['name'];

        $config['upload_path']         = 'assets/img/gallery/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']         = 5000;
        $config['max_width']            = 1152;
        $config['max_height']           = 1152;
        $config['file_name']         = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            if (strpos($this->upload->display_errors('', ''), "larger than the permitted") !== false) {
                $this->session->set_flashdata('error', "Ukuran melebihi 5mb");
            } else if (strpos($this->upload->display_errors('', ''), "doesn't fit into the allowed dimensions") !== false) {
                $this->session->set_flashdata('error', "Ukuran width dan height melebihi batas yang di tentukan Width 1152px dan Height 768px");
            } else if (strpos($this->upload->display_errors('', ''), "The filetype you are attempting to upload is not allowed") !== false) {
                $this->session->set_flashdata('error', "Format Gambar Harus PNG Atau JPG");
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            }
            redirect('admin/galeri');
        }
        return $this->upload->data('file_name');
    }
    //foto Galeri
    private function uploadKategori()
    {
        $image_kategori_name = rand(1, 1000) . '-' . $_FILES["image_kategori"]['name'];

        $config['upload_path']         = 'assets/img/kategori_obat/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']         = 5000;
        $config['max_width']            = 1152;
        $config['max_height']           = 1152;
        $config['file_name']         = $image_kategori_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image_kategori')) {
            if (strpos($this->upload->display_errors('', ''), "larger than the permitted") !== false) {
                $this->session->set_flashdata('error', "Ukuran melebihi 5mb");
            } else if (strpos($this->upload->display_errors('', ''), "doesn't fit into the allowed dimensions") !== false) {
                $this->session->set_flashdata('error', "Ukuran width dan height melebihi batas yang di tentukan Width 1152px dan Height 768px");
            } else if (strpos($this->upload->display_errors('', ''), "The filetype you are attempting to upload is not allowed") !== false) {
                $this->session->set_flashdata('error', "Format Gambar Harus PNG Atau JPG");
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            }
            redirect('admin/galeri');
        }
        return $this->upload->data('file_name');
    }
    //foto Obat
    private function uploadObat()
    {
        $image_obat_name = rand(1, 1000) . '-' . $_FILES["image_obat"]['name'];

        $config['upload_path']         = 'assets/img/obat/';
        $config['allowed_types']     = 'gif|jpg|png';
        $config['max_size']         = 4000;
        $config['max_width']            = 540;
        $config['max_height']           = 540;
        $config['file_name']         = $image_obat_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image_obat')) {
            if (strpos($this->upload->display_errors('', ''), "larger than the permitted") !== false) {
                $this->session->set_flashdata('error', "Ukuran melebihi 5mb");
            } else if (strpos($this->upload->display_errors('', ''), "doesn't fit into the allowed dimensions") !== false) {
                $this->session->set_flashdata('error', "Ukuran width dan height melebihi batas yang di tentukan Width 540px dan Height 540px");
            } else if (strpos($this->upload->display_errors('', ''), "The filetype you are attempting to upload is not allowed") !== false) {
                $this->session->set_flashdata('error', "Format Gambar Harus PNG Atau JPG");
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            }
            redirect('admin/obat');
        }
        return $this->upload->data('file_name');
    }
}
