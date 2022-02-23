<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_petugas');
        $this->proses();
    }
    private function proses()
    {
        if ($this->session->userdata('level') != 'petugas') {
            redirect('403');
        }
    }
    //All View
    public function index()
    {
        $data['gtgl'] = $this->M_petugas->getTestTgl();

        $this->load->view('petugas/template/header');
        $this->load->view('petugas/template/sidebar');
        $this->load->view('petugas/index', $data);
        $this->load->view('petugas/template/footer');
    }

    public function janji_labo()
    {
        $data['janji'] = $this->M_petugas->getAllDataJanji();
        $data['t'] = $this->M_petugas->getAllDataTolak();
        $data['s'] = $this->M_petugas->getAllDataSelesai();
        $this->load->view('petugas/template/header');
        $this->load->view('petugas/template/sidebar');
        $this->load->view('petugas/janji_labo', $data);
        $this->load->view('petugas/template/footer');
    }
    public function d_janji($id)
    {
        $data['janji'] = $this->M_petugas->getAllJanjiByid($id);
        $this->load->view('petugas/template/header');
        $this->load->view('petugas/template/sidebar');
        $this->load->view('petugas/d_janji', $data);
        $this->load->view('petugas/template/footer');
    }
    public function u_password()
    {
        $data['user'] = $this->db->get_where('user', ['auth_username' => $this->session->userdata('auth_username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('petugas/template/header');
            $this->load->view('petugas/template/sidebar');
            $this->load->view('petugas/u_password');
            $this->load->view('petugas/template/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['auth_password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sama!</div>');
                redirect('petugas/u_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
                    redirect('petugas/u_password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('auth_password', $password_hash);
                    $this->db->where('auth_username', $this->session->userdata('auth_username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Di rubah!</div>');
                    redirect('petugas/u_password');
                }
            }
        }
    }
    public function kf()
    {
        $mail = new PHPMailer;

        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $test = $this->input->post('test');
        $date = $this->input->post('date');
        $jam_datang = $this->input->post('jam_datang');
        $jam_akhir = $this->input->post('jam_akhir');

        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "mail.hibatulakmal.xyz"; //hostname masing-masing provider email
        // uncomment jika melakukan debugging
        // $mail->SMTPDebug = 2;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "info@hibatulakmal.xyz"; //user email
        $mail->Password = "7402201akmal"; //password email
        $mail->SetFrom("info@hibatulakmal.xyz", "Admin | GOODTEST"); //set email pengirim
        $mail->Subject = "Konfirmasi Jadwal Laboratorium GOODTEST"; //subyek email
        $mail->AddAddress($email, $nama_lengkap); //tujuan email
        $mail->MsgHTML("<style>
            table{
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            </style>
            <table>
            <tr><img src='https://camoiinayanika.id/assets/images/Untitled-1.png'>
    </tr>
            <tr>
              <td><h3>Terima kasih telah menggunakan layanan Di Laboratorium Goodtest.</h3></td>
            </tr>
            <tr>
                <td>
                    <h4><strong>Detail Janji :</strong></h4>
                </td>
            </tr>
            <tr>
                <td>
                   Nama Lengkap : <strong>" . $nama_lengkap . "</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Test Laboratorium : <strong>" . $test . "</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Buat Janji : <strong>" . format_indo($date) . "</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Jam : <strong>" . $jam_datang . " WIB - " . $jam_akhir . " WIB</strong>
                </td>
            </tr>
            <tr>
        <td>
            <br>
            <h4>Notes : Tanggal Buat Janji di Laboratorium sewaktu waktu dapat berubah bila kouta Laboratorium GOODTest Sudah Penuh<br> Terimakasih Atas Perhatian Anda <br><br><br>Salam Hangat &hearts;<br> Admin Labotarium GOODTEST</h4>
        </td>
    </tr>
            <tr>
    <td>
        <h4>Kontak Kami  <br><br> Alamat : Jl. Siliwangi Ruko Vila Dago Blok AB/02 Benda Baru Pamulang Kota Tangerang Selatan 15418 
        <br>Telp : +62 877-2000-7800
        <br>Email : info@goodtetslab.id
        </h4>
    </td>
</tr>
            </table>");
        if ($mail->Send()) {
            echo "Masuk";
        } else {
            echo "Failed to sending message";
        }
        $this->M_petugas->konfirmasi();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Konfirmasi Pasien!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        echo "<script>window.location.assign('janji_labo')</script>";
    }

    public function konfirmasi()
    {
        $this->M_petugas->konfirmasi();
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Konfirmasi Pasien!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('petugas/janji_labo');
    }
    public function tolak($id)
    {

        $this->M_petugas->tolak($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Tolak Pasien!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('petugas/janji_labo');
    }
    public function h_janji($id)
    {
        $this->M_petugas->hapusJanji($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Hapus Pasien!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('petugas/janji_labo');
    }
    public function selesai_janji($id)
    {
        $this->M_petugas->selesai_janji($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Berhasil Pasien Sudah Selesai!</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('petugas/janji_labo');
    }
    public function c_janji($id)
    {
        $this->M_petugas->changeJanji($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-check"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">Berhasil Ubah Janji!</p>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('petugas/janji_labo');
    }
}
