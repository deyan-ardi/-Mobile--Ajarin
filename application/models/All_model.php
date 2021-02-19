<?php

/**
 * Name:    Ion Auth Model
 * Author:  Ben Edmunds
 *           ben.edmunds@gmail.com
 * @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization. This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Ion Auth Model
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class All_model extends CI_Model
{
    public function tambahKelasBaru($token, $user)
    {
        $query = array(
            'kode_kelas' => "#" . $token,
            'nama_kelas' => $this->input->post('nama_kelas', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'created_by' => $user,
        );
        return $this->db->insert('daftar_kelas', $query);
    }
    public function ubahKelasBaru($id_kelas)
    {
        $query = array(

            'nama_kelas' => $this->input->post('nama_kelas', true),
            'deskripsi' => $this->input->post('deskripsi', true),

        );
        return $this->db->where('id_kelas='.$id_kelas)->update('daftar_kelas', $query);
    }
    public function getAllKelas()
    {
        return $this->db->get('daftar_kelas')->result_array();
    }
    public function getKelasWhere($id_kelas)
    {
        return $this->db->where('id_kelas=' . $id_kelas)->get('daftar_kelas')->result_array();
    }
    public function hapusKelas($id_kelas){
        return $this->db->where('id_kelas='.$id_kelas)->delete('daftar_kelas');
    }
    public function getKelasByCode($kode){
        return $this->db->where('kode_kelas='."'$kode'")->get('daftar_kelas')->result_array();
    }
    public function getKelasByCodeAjax($kode)
    {
        return $this->db->like('kode_kelas', $kode)->get('daftar_kelas')->result_array();
    }
    public function tambahAnggotaKelas($id_kelas,$id_anggota){
        $query = array(
            'id_kelas' => $id_kelas,
            'id_user' => $id_anggota,
        );
        return $this->db->insert('anggota_kelas', $query);
    }
    public function getAllBab($id_kelas){
        return $this->db->where('id_kelas='.$id_kelas)->get('daftar_bab')->result_array();
    }
    public function getAllMateri()
    {
        return $this->db->get('daftar_materi')->result_array();
    }
    public function tambahBabKelas($id_kelas)
    {
        $query = array(
            'id_kelas' => $id_kelas,
            'nama_bab' => $this->input->post('nama_bab', true),
            'deskripsi_bab' => $this->input->post('deskripsi', true),
        );
        return $this->db->insert('daftar_bab', $query);
    }
    public function getBabWhere($id_bab){
        return $this->db->where('id_bab='.$id_bab)->get('daftar_bab')->result_array();
    }
    public function ubahBabKelas($id_bab)
    {
        $query = array(
            'nama_bab' => $this->input->post('nama_bab', true),
            'deskripsi_bab' => $this->input->post('deskripsi', true),
        );
        return $this->db->where('id_bab='.$id_bab)->update('daftar_bab', $query);
    }
    public function hapusBab($id_bab)
    {
        return $this->db->where('id_bab=' . $id_bab)->delete('daftar_bab');
    }
    public function hapusMateri($id_materi)
    {
        return $this->db->where('id_materi=' . $id_materi)->delete('daftar_materi');
    }
    public function tambahMateriPembelajaran($id_bab)
    {
        $query = array(
            'id_bab' => $id_bab,
            'nama_materi' => $this->input->post('nama_materi', true),
            'deskripsi_materi' => $this->input->post('deskripsi', true),
            'kategori_materi' => $this->input->post('kategori', true),
            'link_materi' => $this->input->post('link', true),
        );
        return $this->db->insert('daftar_materi', $query);
    }
    public function ubahMateriPembelajaran($id_materi)
    {
        $query = array(
            'nama_materi' => $this->input->post('nama_materi', true),
            'deskripsi_materi' => $this->input->post('deskripsi', true),
            'kategori_materi' => $this->input->post('kategori', true),
            'link_materi' => $this->input->post('link', true),
        );
        return $this->db->where('id_materi='.$id_materi)->update('daftar_materi', $query);
    }
    public function getMateriWhere($id_materi){
        return $this->db->where('id_materi='.$id_materi)->get('daftar_materi')->result_array();
    }
}