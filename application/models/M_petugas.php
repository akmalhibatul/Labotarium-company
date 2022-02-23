<?php
class M_petugas extends CI_Model
{
    //dashboard
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
        $date = $this->input->post('date');
        $jam_datang = $this->input->post('jam_datang');
        $jam_akhir = $this->input->post('jam_akhir');
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
    public function changeJanji($id)
    {
        $status = 'proses';
        $this->db->where('id_janji', $id);
        $this->db->update('janji_labo', ['status' => $status]);
    }
}
