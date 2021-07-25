<?php defined('BASEPATH') or exit('No direct script access allowed');
    ini_set('date.timezone', 'Asia/Jakarta'); 
class User_model extends CI_Model
{
    function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('phone', $post['phone']);
        $this->db->where('password', sha1($post['password']));
        return $query = $this->db->get();
    }

    function registrasi($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nik'           => $post['nik'],
            'nama_lengkap'  => $post['nama_user'],
            'komunitas'     => $post['komunitas'],
            'tempat_lahir'  => $post['tempat_lahir'],
            'tanggal_lahir' => $post['date'],
            'alamat'        => $post['alamat'],
            'phone'         => $post['phone'],
            'password'      => sha1($post['password']),
            'level'         => 2,
        ];
        $this->db->insert('users', $params);
    }

    function get($id = null)
    {
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        return $query = $this->db->get();
    }

    function check_data($checkdata, $code, $id = null)
    {
        $this->db->from('users');
        $this->db->where($checkdata, $code);
        if ($id != null) {
            $this->db->where('user_id !=', $id);
        }
        return $query =  $this->db->get();
    }

    function update_profile($post)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $params = [
            // nama d db    => nama di inputan
            'nama_lengkap'  => $post['nama'],
            'komunitas'     => $post['komunitas'],
            'tempat_lahir'  => $post['tempat_lahir'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'alamat'        => $post['alamat'],
            'phone'         => $post['phone'],
            'updated'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $params);
    }

    function update_password($post)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $params = [
            // nama d db    => nama di inputan
            'password'      => sha1($post['password']),
            'updated'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('users', $params);
    }
}
