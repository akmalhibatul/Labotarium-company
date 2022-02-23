<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('M_page');
        }

        //view 
        public function index()
        {
                $data['setting'] = $this->M_page->setting();
                $data['layanan'] = $this->M_page->getAllDataLayanan();
                $data['artikel'] = $this->M_page->getDataArtikel();
                $data['galeri'] = $this->M_page->getDataGaleri();
                $this->load->view('index', $data);
        }

        public function l_labo()
        {

                // $keyword = $this->input->get('keyword');
                // $data = $this->M_page->ambil_data($keyword);
                // $data = array(
                //         'keyword'        => $keyword,
                //         'data'                => $data
                // );
                $data['data'] = $this->M_page->getAllDataKategori();
                $data['setting'] = $this->M_page->setting();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('l_labo', $data);
                $this->load->view('template/footer', $data);
        }
        public function test_kategori($slug)
        {
                $data['kategori'] = $this->M_page->getAllDataTestByKategoriID($slug);
                $data['kt'] = $this->M_page->getKategoriTest($slug);
                $data['setting'] = $this->M_page->setting();

                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('test_kategori', $data);
                $this->load->view('template/footer', $data);
        }
        public function search_labo()
        {

                $keyword = $this->input->get('keyword');
                $data = $this->M_page->ambil_kategori($keyword);
                $data = array(
                        'keyword'        => $keyword,
                        'data'                => $data
                );
                $data['setting'] = $this->M_page->setting();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('search_labo', $data);
                $this->load->view('template/footer', $data);
        }
        public function d_labo($slug)
        {
                $data['setting'] = $this->M_page->setting();

                $data['l'] = $this->M_page->detailLabo($slug);

                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('d_labo', $data);
                $this->load->view('template/footer', $data);
        }
        public function d_covid($slug)
        {
                $data['setting'] = $this->M_page->setting();

                $data['l'] = $this->M_page->detailLabo($slug);

                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('d_covid', $data);
                $this->load->view('template/footer', $data);
        }
        public function search_obat()
        {
                $data['setting'] = $this->M_page->setting();
                $keyword = $this->input->get('keyword');
                $data = $this->M_page->ambil_obat($keyword);
                $data = array(
                        'keyword'        => $keyword,
                        'data'                => $data
                );
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('search_obat', $data);
                $this->load->view('template/footer', $data);
        }
        public function l_apotek()
        {
                $data['kategori'] = $this->M_page->getAllDataKategori();
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('l_apotek', $data);
                $this->load->view('template/footer');
        }
        public function l_covid()
        {
                $data['setting'] = $this->M_page->setting();
                $data['covid'] = $this->M_page->getAllDataTestCovid();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('l_covid', $data);
                $this->load->view('template/footer', $data);
        }
        public function l_dokter()
        {
                $data['setting'] = $this->M_page->setting();
                $data['dokter'] = $this->M_page->getAllDataDokter();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('l_dokter', $data);
                $this->load->view('template/footer', $data);
        }
        public function d_dokter($slug)
        {
                $data['setting'] = $this->M_page->setting();
                $data['dokter'] = $this->M_page->getAllDataDokterById($slug);
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('d_dokter', $data);
                $this->load->view('template/footer', $data);
        }
        public function artikel()
        {
                $this->load->library('pagination');

                //search
                $config['base_url'] = BASE_URL() . "artikel/";
                $this->db->from('artikel');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 8;


                $config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center mt-3">';
                $config['full_tag_close'] = '</ul></nav>';

                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';


                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';


                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';


                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';

                $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close'] = '</a></li>';

                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';

                $config['attributes'] = array('class' => 'page-link');

                $this->pagination->initialize($config);
                $data['start'] = $this->uri->segment(3);
                if ($this->input->get("keyword", true)) {
                        // Jika ada pencarian
                        $data['artikel'] = $this->M_page->getArtikel($config['per_page'], $data['start'], $this->input->get("keyword", true));
                } else {
                        // Jika tidak ada
                        $data['artikel'] = $this->M_page->getArtikel($config['per_page'], $data['start']);
                }
                $data['setting'] = $this->M_page->setting();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('artikel', $data);
                $this->load->view('template/footer', $data);
        }

        public function d_artikel($slug)
        {
                $data['setting'] = $this->M_page->setting();
                $data['aa'] = $this->M_page->getDataArtikelDetail();
                $data['artikel'] = $this->M_page->getArtikelById($slug);
                $data['user'] = $this->M_page->userArt($slug);
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('d_artikel', $data);
                $this->load->view('template/footer', $data);
        }
        public function b_janji()
        {
                $data['setting'] = $this->M_page->setting();
                $data['test'] = $this->M_page->get_kategori();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('b_janji', $data);
        }
        public function get_sub_kategori()
        {
                $category_id = $this->input->post('id', TRUE);
                $data = $this->M_page->get_sub_kategori($category_id)->result();
                echo json_encode($data);
        }
        public function b_janji_covid()
        {
                $data['setting'] = $this->M_page->setting();
                $data['covid'] = $this->M_page->getAllDataTestCovid();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('b_janji_covid', $data);
                $this->load->view('template/footer', $data);
        }
        public function selesai()
        {
                $data['setting'] = $this->M_page->setting();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('selesai');
                $this->load->view('template/footer', $data);
        }
        public function nf()
        {
                $this->load->view('404');
        }
        public function ad()
        {
                $this->load->view('403');
        }
        public function kategori($nama_kategori)
        {
                $this->load->library('pagination');

                //search
                $config['base_url'] = BASE_URL() . "obat/$nama_kategori";
                $this->db->from('obat');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 8;


                $config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center mt-3">';
                $config['full_tag_close'] = '</ul></nav>';

                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';


                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';


                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';


                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';

                $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close'] = '</a></li>';

                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';

                $config['attributes'] = array('class' => 'page-link');

                $this->pagination->initialize($config);
                $data['start'] = $this->uri->segment(3);
                $data['kategori'] = $this->M_page->getKategoria($config['per_page'], $data['start']);

                $data['kategori'] = $this->M_page->GetAllItemByCategoryID($nama_kategori);
                $data['kt'] = $this->M_page->getKategori($nama_kategori);

                $data['setting'] = $this->M_page->setting();
                $this->load->view('template/header');
                $this->load->view('template/navbar', $data);
                $this->load->view('kategori', $data);
                $this->load->view('template/footer');
        }
        public function d_obat($slug)
        {
                $data['obat'] = $this->M_page->getObat($slug);
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('d_obat', $data);
                $this->load->view('template/footer');
        }

        //All Input Data
        public function create_test()
        {
                $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('telp', 'Nomer Telepon', 'required|trim|numeric|min_length[11]');
                $this->form_validation->set_rules('date', 'Tanggal', 'required|trim');
                $this->form_validation->set_rules('id_test', 'Test', 'required|trim|numeric');
                if ($this->form_validation->run() == FALSE) {
                        $data['setting'] = $this->M_page->setting();
                        $data['test'] = $this->M_page->getAllDataTest();
                        $this->load->view('template/header');
                        $this->load->view('template/navbar', $data);
                        $this->load->view('b_janji', $data);
                        $this->load->view('template/footer');
                } else {
                        $this->M_page->insert_test();
                        redirect('selesai');
                }
        }
        public function create_test_covid()
        {
                $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('telp', 'Nomer Telepon', 'required|trim|numeric|min_length[11]');
                $this->form_validation->set_rules('date', 'Tanggal', 'required|trim');
                $this->form_validation->set_rules('id_test', 'Test', 'required|trim|numeric');
                if ($this->form_validation->run() == FALSE) {
                        $data['setting'] = $this->M_page->setting();
                        $data['test'] = $this->M_page->getAllDataTest();
                        $this->load->view('template/header');
                        $this->load->view('template/navbar', $data);
                        $this->load->view('b_janji_covid', $data);
                        $this->load->view('template/footer');
                } else {
                        $this->M_page->insert_test_covid();
                        redirect('selesai');
                }
        }
        public function coming_soon()
        {
                $this->load->view('coming_soon');
        }
}
