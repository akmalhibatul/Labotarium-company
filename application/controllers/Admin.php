<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->proses();
    }
    private function proses()
    {
        if ($this->session->userdata('level') != 'admin') {
            redirect('403');
        }
    }
    //All View
    public function index()
    {
        $data['jm_art'] = $this->M_admin->jm_art();
        $data['jm_dk'] = $this->M_admin->jm_dk();
        $data['jm_g'] = $this->M_admin->jm_g();
        $data['jm_t'] = $this->M_admin->jm_t();
        $data['jm_l'] = $this->M_admin->jm_l();

        $data['gtgl'] = $this->M_admin->getTestTgl();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/template/footer');
    }

    public function janji_labo()
    {
        $data['janji'] = $this->M_admin->getAllDataJanji();
        $data['t'] = $this->M_admin->getAllDataTolak();
        $data['s'] = $this->M_admin->getAllDataSelesai();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/janji_labo', $data);
        $this->load->view('admin/template/footer');
    }
    public function user()
    {
        $data['user'] = $this->M_admin->getAllUser();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/template/footer');
    }
    public function artikel()
    {
        $data['art'] = $this->M_admin->getAllArtikel();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/artikel', $data);
        $this->load->view('admin/template/footer');
    }
    public function dokter()
    {
        $data['dk'] = $this->M_admin->getAllDokter();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/dokter', $data);
        $this->load->view('admin/template/footer');
    }
    public function galeri()
    {
        $data['galeri'] = $this->M_admin->getAllGaleri();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/galeri', $data);
        $this->load->view('admin/template/footer');
    }
    public function kategori()
    {
        $data['kategori'] = $this->M_admin->getAllkategori();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/kategori', $data);
        $this->load->view('admin/template/footer');
    }
    public function test()
    {
        $data['test'] = $this->M_admin->getAlltest();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/test', $data);
        $this->load->view('admin/template/footer');
    }
    public function kategori_test()
    {
        $data['kt'] = $this->M_admin->getAllKTtest();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/kategori_test', $data);
        $this->load->view('admin/template/footer');
    }
    public function layanan()
    {
        $data['layanan'] = $this->M_admin->getAlllayanan();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/layanan', $data);
        $this->load->view('admin/template/footer');
    }
    public function obat()
    {
        $data['obat'] = $this->M_admin->getAllobat();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/obat', $data);
        $this->load->view('admin/template/footer');
    }
    public function v_obat($id)
    {
        $data['obat'] = $this->M_admin->getAllobatId($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/v_obat', $data);
        $this->load->view('admin/template/footer');
    }

    //All CRUD

    //create Artikel
    public function t_artikel()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_artikel');
        $this->load->view('admin/template/footer');
    }
    public function createArtikel()
    {
        $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'required|trim|min_length[10]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_artikel');
            $this->load->view('admin/template/footer');
        } else {
            $this->M_admin->createArtikel();
            $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Upload Artikel!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/artikel');
        }
    }
    //edit artikel
    public function e_artikel($id)
    {
        $data['artikel'] = $this->M_admin->getArtikelById($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_artikel', $data);
        $this->load->view('admin/template/footer');
    }
    public function updateArtikel()
    {
        $this->M_admin->updateArtikel();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Edit Artikel!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/artikel');
    }
    //hapus Artikel
    public function h_artikel($id)
    {
        $this->db->where('id_artikel', $id);
        $query = $this->db->get('artikel');
        $row = $query->row();

        unlink("./assets/img/artikel/$row->img_artikel");

        $this->M_admin->deleteArtikel($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Artikel!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/artikel');
    }


    //create Dokter
    public function t_dokter()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_dokter');
        $this->load->view('admin/template/footer');
    }
    public function createDokter()
    {
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim|min_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_dokter');
            $this->load->view('admin/template/footer');
        } else {
            $this->M_admin->createDokter();
            $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Upload Dokter!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/dokter');
        }
    }
    //edit dokter
    public function e_dokter($id)
    {
        $data['dokter'] = $this->M_admin->getDokterById($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_dokter', $data);
        $this->load->view('admin/template/footer');
    }
    public function updateDokter()
    {
        $this->M_admin->updateDokter();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Edit Dokter!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dokter');
    }
    public function h_dokter($id)
    {
        $this->db->where('id_dokter', $id);
        $query = $this->db->get('dokter');
        $row = $query->row();

        unlink("./assets/img/doctors/$row->image_dokter");

        $this->M_admin->deleteDokter($id);

        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Dokter!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dokter');
    }

    //craete galeri
    public function t_galeri()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_galeri');
        $this->load->view('admin/template/footer');
    }
    public function createGaleri()
    {
        $this->M_admin->createGaleri();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Tambah Galeri!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/galeri');
    }
    public function h_galeri($id)
    {
        $this->db->where('id_galeri', $id);
        $query = $this->db->get('galeri');
        $row = $query->row();

        unlink("./assets/img/gallery/$row->image");

        $this->db->delete('galeri', array('id_galeri' => $id));

        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Galeri!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/galeri');
    }

    //create kategori
    public function t_kategori()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_kategori');
        $this->load->view('admin/template/footer');
    }
    public function createKategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_kategori');
            $this->load->view('admin/template/footer');
        } else {
            $this->M_admin->createKategori();
            $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Upload Kategori!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/kategori');
        }
    }
    //edit kategori
    public function e_kategori($id)
    {
        $data['k'] = $this->M_admin->getKAtegoriById($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_kategori', $data);
        $this->load->view('admin/template/footer');
    }
    public function updateKategori()
    {
        $this->M_admin->updateKategori();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Edit Kategori!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kategori');
    }
    public function h_kategori($id)
    {
        $this->M_admin->deleteKategori($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Kategori!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kategori');
    }

    //create test
    public function t_test()
    {
        $data['kt'] = $this->M_admin->getAllKTtest();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_test', $data);
        $this->load->view('admin/template/footer');
    }
    public function createTest()
    {
        $this->form_validation->set_rules('nama', 'Nama Test', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['kt'] = $this->M_admin->getAllKTtest();

            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_test', $data);
            $this->load->view('admin/template/footer');
        } else {
            $this->M_admin->createTest();
            $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Upload Test!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/test');
        }
    }
    public function e_test($id)
    {
        $data['test'] = $this->M_admin->getTestById($id);
        $data['kt'] = $this->M_admin->getAllKTtest();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_test', $data);
        $this->load->view('admin/template/footer');
    }
    public function updateTest()
    {
        $this->M_admin->updateTest();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Edit Test!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/test');
    }
    public function h_test($id)
    {
        $this->M_admin->deleteTest($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Test!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/test');
    }

    //create Kategori Test
    public function t_kt()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_kt');
        $this->load->view('admin/template/footer');
    }
    public function insertKT()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_kt');
            $this->load->view('admin/template/footer');
        } else {
            $this->M_admin->insertKT();
            $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
                <div class="flex-00-auto">
                    <i class="fa fa-fw fa-check"></i>
                </div>
                <div class="flex-fill ml-3">
                    <p class="mb-0">Berhasil Tambah Kategori Test!</p>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/kategori_test');
        }
    }
    public function e_kt($id)
    {
        $data['kt'] = $this->M_admin->getKTbyID($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_kt', $data);
        $this->load->view('admin/template/footer');
    }
    public function updateKT()
    {
        $this->M_admin->updateKT();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Ubah Kategori Test!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kategori_test');
    }
    public function h_kt($id)
    {
        $this->M_admin->deleteKT($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Kategori Test!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/kategori_test');
    }

    // //create Layanan
    // public function t_layanan()
    // {
    //     $this->load->view('admin/template/header');
    //     $this->load->view('admin/template/sidebar');
    //     $this->load->view('admin/t_layanan');
    //     $this->load->view('admin/template/footer');
    // }
    // public function createLayanan()
    // {
    //     $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    //     $this->form_validation->set_rules('isi', 'Isi', 'required|trim');
    //     $this->form_validation->set_rules('link', 'Link', 'required|trim');
    //     $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('admin/template/header');
    //         $this->load->view('admin/template/sidebar');
    //         $this->load->view('admin/t_layanan');
    //         $this->load->view('admin/template/footer');
    //     } else {
    //         $this->M_admin->createLayanan();
    //         $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
    //         <div class="flex-00-auto">
    //             <i class="fa fa-fw fa-check"></i>
    //         </div>
    //         <div class="flex-fill ml-3">
    //             <p class="mb-0">Berhasil Upload Layanan!</p>
    //         </div>
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //         </button>
    //     </div>');
    //         redirect('admin/layanan');
    //     }
    // }
    // public function e_layanan($id)
    // {
    //     $data['l'] = $this->M_admin->getLayananById($id);
    //     $this->load->view('admin/template/header');
    //     $this->load->view('admin/template/sidebar');
    //     $this->load->view('admin/e_layanan', $data);
    //     $this->load->view('admin/template/footer');
    // }
    // public function updateLayanan()
    // {
    //     $this->M_admin->updateLayanan();
    //     $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
    //     <div class="flex-00-auto">
    //         <i class="fa fa-fw fa-check"></i>
    //     </div>
    //     <div class="flex-fill ml-3">
    //         <p class="mb-0">Berhasil Update Layanan!</p>
    //     </div>
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div>');
    //     redirect('admin/layanan');
    // }
    // public function h_layanan($id)
    // {
    //     $this->M_admin->deleteLayanan($id);
    //     $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
    //     <div class="flex-00-auto">
    //         <i class="fa fa-fw fa-check"></i>
    //     </div>
    //     <div class="flex-fill ml-3">
    //         <p class="mb-0">Berhasil Hapus Layanan!</p>
    //     </div>
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div>');
    //     redirect('admin/layanan');
    // }

    //create Obat
    public function t_obat()
    {
        $data['k'] = $this->M_admin->getAllkategori();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_obat', $data);
        $this->load->view('admin/template/footer');
    }
    public function createObat()
    {
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('indeksi_umum', 'Indeksi Umum', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('komposisi', 'Komposisi', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('dosis', 'Dosis', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('aturan_pakai', 'Aturan Pakai', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('kontra_indikasi', 'Kontra Indikasi', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('perhatian', 'Perhatian', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('efek_samping', 'Efek Samping', 'required|trim|min_length[1]');
        $this->form_validation->set_rules('segmentasi', 'Segmentasi', 'required|trim|min_length[2]');
        $this->form_validation->set_rules('kemasan', 'Kemasan', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('manufaktur', 'Manufaktur', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('no_registrasi', 'No registrasi', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['k'] = $this->M_admin->getAllkategori();
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_obat', $data);
            $this->load->view('admin/template/footer');
        } else {
            $this->M_admin->createObat();
            $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-check"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">Berhasil Upload Obat!</p>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
            redirect('admin/obat');
        }
    }
    public function e_obat($id)
    {
        $data['o'] = $this->M_admin->getAllobatId($id);
        $data['k'] = $this->M_admin->getAllkategori();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_obat', $data);
        $this->load->view('admin/template/footer');
    }
    public function updateObat()
    {
        $this->M_admin->updateObat();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-check"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">Berhasil Update Obat!</p>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/obat');
    }
    public function h_obat($id)
    {
        $this->M_admin->deleteObat($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-check"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">Berhasil Hapus Obat!</p>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/obat');
    }

    //user
    public function t_user()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/t_user');
        $this->load->view('admin/template/footer');
    }
    public function regis_petugas()
    {
        $this->form_validation->set_rules('nama', 'Nama Petugas', 'required|trim');
        $this->form_validation->set_rules('auth_username', 'Username', 'required|trim|is_unique[user.auth_username]', [
            'is_unique' => 'Username Sudah Ada!'
        ]);
        $this->form_validation->set_rules('auth_password', 'Password', 'required|trim|min_length[4]|matches[password1]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[auth_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/t_user');
            $this->load->view('admin/template/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $auth_username = $this->input->post('auth_username', true);
            $level = $this->input->post('level', true);
            $data = [
                'auth_username' => htmlspecialchars($auth_username),
                'auth_password' => password_hash($this->input->post('auth_password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($nama),
                'level' => htmlspecialchars($level),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil Registrasi Akun</div>');
            redirect('admin/user');
        }
    }
    public function e_user($id)
    {
        $data['user'] = $this->M_admin->getUserById($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/e_user', $data);
        $this->load->view('admin/template/footer');
    }
    public function u_user()
    {
        $level = $this->input->post('level');
        $id = $this->input->post('id_user');

        $this->db->where('id_user', $id);
        $this->db->update('user', ['level' => $level]);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil Ubah Akun</div>');
        redirect('admin/user');
    }
    public function h_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil Hapus Akun</div>');
        redirect('admin/user');
    }
    public function u_password()
    {
        $data['user'] = $this->db->get_where('user', ['auth_username' => $this->session->userdata('auth_username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Awal', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/u_password');
            $this->load->view('admin/template/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['auth_password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sama!</div>');
                redirect('admin/u_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
                    redirect('admin/u_password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('auth_password', $password_hash);
                    $this->db->where('auth_username', $this->session->userdata('auth_username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Di rubah!</div>');
                    redirect('admin/u_password');
                }
            }
        }
    }

    //setting
    public function setting()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/setting');
        $this->load->view('admin/template/footer');
    }
    public function u_setting()
    {
        $id_setting = $this->input->post('id_setting');
        $data = array(
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'linkedin' => $this->input->post('linkedin'),
        );
        $this->db->where('id_setting', $id_setting);
        $this->db->update('setting', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Setting Berhasil Di Update !</div>');
        redirect('admin/setting');
    }
}
