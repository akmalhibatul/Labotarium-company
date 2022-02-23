<?php
class M_auth extends CI_Model
{
    public function regis()
    {
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
    }
}
