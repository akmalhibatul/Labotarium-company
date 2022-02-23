<?php
class M_page extends CI_Model
{

    //page
    public function setting()
    {
        return $this->db->get_where('setting', ['id_setting' => '1'])->row_array();
    }
    public function get_kategori()
    {
        return $this->db->get('kategori_labo')->result_array();
    }

    public function get_sub_kategori($category_id)
    {
        $query = $this->db->get_where('labotarium', array('id_kategori' => $category_id));
        return $query;
    }
    public function detailLabo($slug)
    {
        return $this->db->query("SELECT * FROM labotarium WHERE slug='$slug'")->row_array();
    }
    public function getAllDataTest()
    {
        return $this->db->query("SELECT * FROM labotarium WHERE type='umum'")->result_array();
    }
    public function getAllDataTestCovid()
    {
        return $this->db->query("SELECT * FROM labotarium WHERE type='covid'")->result_array();
    }
    public function getAllDataLayanan()
    {
        return $this->db->get('layanan')->result_array();
    }
    public function getDataArtikel()
    {
        return $this->db->query("SELECT * FROM `artikel` ORDER BY id_artikel DESC LIMIT 3")->result_array();
    }
    public function getDataArtikelDetail()
    {
        return $this->db->query("SELECT * FROM `artikel` ORDER BY id_artikel DESC LIMIT 6")->result_array();
    }
    public function getAllDataArtikel()
    {
        return $this->db->query("SELECT * FROM `artikel` ORDER BY id_artikel DESC")->result_array();
    }
    public function getDataGaleri()
    {
        return $this->db->query("SELECT * FROM `galeri` ORDER BY id_galeri  DESC")->result_array();
    }
    public function getArtikelById($slug)
    {
        return $this->db->get_where('artikel', ['slug' => $slug])->row_array();
    }
    public function getAllDataDokter()
    {
        return $this->db->get('dokter')->result_array();
    }
    public function getAllDataDokterById($slug)
    {
        return $this->db->get_where('dokter', ['slug' => $slug])->row_array();
    }
    public function getAllDataKategori()
    {
        return $this->db->get('kategori_labo')->result_array();
    }
    public function getAllDataTestByKategoriID($slug)
    {
        return $this->db->query("SELECT labotarium.id, labotarium.nama,labotarium.slug FROM `labotarium` INNER JOIN kategori_labo ON kategori_labo.id_kategori = labotarium.id_kategori WHERE kategori_labo.slug = '$slug'
        ")->result_array();
    }
    public function getKategoriTest($slug)
    {
        return $this->db->query("SELECT * FROM kategori_labo WHERE slug = '$slug'")->row_array();
    }
    public function GetAllItemByCategoryID($nama_kategori)
    {
        $sql = "SELECT kategori_obat.id_kategori, kategori_obat.nama_kategori, kategori_obat.image_kategori , obat.id_obat , obat.nama_obat, obat.slug, obat.satuan, obat.image_obat FROM `kategori_obat` INNER JOIN obat ON kategori_obat.id_kategori = obat.id_kategori WHERE kategori_obat.nama_kategori = '$nama_kategori'";
        return $this->db->query($sql)->result_array();
    }
    public function getKategori($nama_kategori)
    {
        return $this->db->query("SELECT * FROM kategori_obat WHERE nama_kategori = '$nama_kategori'")->row_array();
    }
    public function getObat($slug)
    {
        $sql = "SELECT * FROM obat WHERE slug = '$slug'";
        return $this->db->query($sql)->row_array();
    }
    public function userArt($slug)
    {
        return $this->db->query("SELECT * FROM `artikel` INNER JOIN user ON user.id_user = artikel.id_user WHERE artikel.slug = '$slug'
        ")->row_array();
    }

    //search
    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('labotarium');
        $this->db->where('type', 'umum');
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
        }
        return $this->db->get()->result_array();
    }
    public function ambil_obat($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->order_by('id_obat', 'DESC');
        if (!empty($keyword)) {
            $this->db->like('nama_obat', $keyword);
        }
        return $this->db->get()->result_array();
    }
    public function ambil_kategori($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('labotarium');
        $this->db->order_by('id', 'DESC');
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
        }
        return $this->db->get()->result_array();
    }

    // public function ambil_obat($nama_kategori, $keyword = null)
    // {
    //     if (!empty($keyword)) {
    //         return $this->db->query("SELECT kategori_obat.id_kategori, kategori_obat.nama_kategori,obat.id_obat, obat.nama_obat, obat.satuan, obat.image_obat FROM `kategori_obat` INNER JOIN obat ON obat.id_kategori = kategori_obat.id_kategori WHERE kategori_obat.nama_kategori = '$nama_kategori' AND obat.nama_obat LIKE '%" . $keyword . "%'
    //         ")->result_array();
    //     } else {
    //         return $this->db->query("SELECT kategori_obat.id_kategori, kategori_obat.nama_kategori,obat.id_obat, obat.nama_obat, obat.satuan, obat.image_obat FROM `kategori_obat` INNER JOIN obat ON obat.id_kategori = kategori_obat.id_kategori WHERE kategori_obat.nama_kategori = '$nama_kategori'")->result_array();
    //     }
    // }

    //insert Database
    public function insert_test()
    {
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'date' => $this->input->post('date'),
            'id_test' => $this->input->post('id_test'),
            'type' => $this->input->post('type'),
            'status' => $this->input->post('status'),
        );
        $this->db->insert('janji_labo', $data);
    }
    public function insert_test_covid()
    {
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'date' => $this->input->post('date'),
            'id_test' => $this->input->post('id_test'),
            'type' => $this->input->post('type'),
            'status' => $this->input->post('status'),
        );
        $this->db->insert('janji_labo', $data);
    }


    //count pagenation artikel
    public function getCountArtikel()
    {
        return $this->db->get('artikel')->num_rows();
    }
    public function getArtikel($limit, $start, $kataKunci = NULL)
    {
        if ($kataKunci != NULL) {
            // Query ketika menggunakan pencarian
            $this->db->from('artikel');
            $this->db->like('judul_artikel', $kataKunci);
            $this->db->order_by('id_artikel', 'DESC');
            $this->db->limit($limit, $start);
        } else {
            // Query ketika normal tanpa pencarian
            $this->db->from('artikel');
            $this->db->order_by('id_artikel', 'DESC');
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    //
    public function getKategoria($limit, $start)
    {
        $this->db->from('obat');
        $this->db->order_by('id_obat', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
}
