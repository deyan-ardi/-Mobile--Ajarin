<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (!$this->ion_auth->logged_in()) {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'beranda';
			$this->load->view('master/header', $this->data);
			$this->load->view('index', $this->data);
			$this->load->view('master/footer', $this->data);
		} else {
			redirect('home/dashboard', 'refresh');
		}
	}
	public function dashboard()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['gabung'] = $this->All_model->getAllAnggota($id);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->data['kelas'] = $this->All_model->getAllKelas();
			$this->load->view('master/header', $this->data);
			$this->load->view('page/index', $this->data);
			$this->load->view('master/footer', $this->data);
		}
	}
	public function kelas_saya()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Daftar Kelas Yang Diikuti';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['gabung'] = $this->All_model->getAllAnggota($id);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->data['kelas'] = $this->All_model->getAllKelasSaya($id);
			$this->load->view('master/header', $this->data);
			$this->load->view('page/kelas_saya', $this->data);
			$this->load->view('master/footer', $this->data);
		}
	}
	public function daftar_anggota($id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Daftar Kelas';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['gabung'] = $this->All_model->getAllAnggota($id);
			$this->data['anggota'] = $this->All_model->getAllAnggotaKelas($id_kelas);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->data['kelas'] = $this->All_model->getAllKelas();
			$this->load->view('master/header', $this->data);
			$this->load->view('page/daftar_kelas', $this->data);
			$this->load->view('master/footer', $this->data);
		}
	}
	public function kelas($id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['kelas'] = $this->All_model->getKelasWhere($id_kelas);
			$this->data['bab'] = $this->All_model->getAllBab($id_kelas);
			$this->data['materi'] = $this->All_model->getAllMateri();
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['gabung'] = $this->All_model->getGabungUser($id, $id_kelas);
			$this->data['group'] = $group;
			$this->load->view('master/header', $this->data);
			$this->load->view('page/kelas', $this->data);
			$this->load->view('master/footer', $this->data);
		}
	}
	public function tambah_bab($id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['kelas'] = $this->All_model->getKelasWhere($id_kelas);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->data['gabung'] = $this->All_model->getGabungUser($id, $id_kelas);
			$this->form_validation->set_rules('nama_bab', 'Nama Bab', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Kelas', 'required|max_length[100]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('master/header', $this->data);
				$this->load->view('page/tambah_bab', $this->data);
				$this->load->view('master/footer', $this->data);
			} else {
				if($this->All_model->tambahBabKelas($id_kelas)){
					$this->session->set_flashdata('berhasil', 'Ditambahkan');
					redirect('home/kelas/' . $id_kelas, "refresh");
				} else {
					$this->session->set_flashdata('gagal', 'Ditambahkan');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}
			}
		}
	}
	public function gabung_kelas($id_kelas)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$id = $_SESSION['user_id'];
			if ($this->All_model->getAnggotaWhere($id, $id_kelas) > 0) {
				$this->session->set_flashdata('gagal', 'Gabung Kelas, Anda Sudah Bergabung Dikelas Ini');
				redirect('home/kelas/' . $id_kelas, "refresh");
			} else {
				if ($this->All_model->gabungKelasUser($id_kelas, "Anggota")) {
					$this->session->set_flashdata('berhasil', 'Bergabung');
					redirect('home/kelas/' . $id_kelas, "refresh");
				} else {
					$this->session->set_flashdata('gagal', 'Bergabung');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}
			}
		}
	}
	public function keluar_kelas($id_kelas)
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$id = $_SESSION['user_id'];
			if ($this->All_model->getAnggotaWhere($id, $id_kelas) > 0) {
				if ($this->All_model->keluarKelasUser($id, $id_kelas)) {
					$this->session->set_flashdata('berhasil', 'Keluar Kelas');
					redirect('home/kelas/' . $id_kelas, "refresh");
				} else {
					$this->session->set_flashdata('gagal', 'Keluar Kelas');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}
			} else {
				$this->session->set_flashdata('gagal', 'Keluar Kelas, Anda Tidak Bergabung Dikelas Ini');
				redirect('home/kelas/' . $id_kelas, "refresh");
			}
		}
	}
	public function ubah_bab($id_bab = "", $id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['kelas'] = $this->All_model->getKelasWhere($id_kelas);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->data['gabung'] = $this->All_model->getGabungUser($id, $id_kelas);
			$this->data['bab'] = $this->All_model->getBabWhere($id_bab);
			$this->form_validation->set_rules('nama_bab', 'Nama Bab', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Kelas', 'required|max_length[100]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('master/header', $this->data);
				$this->load->view('page/ubah_bab', $this->data);
				$this->load->view('master/footer', $this->data);
			} else {
				if($this->All_model->ubahBabKelas($id_bab)){
					$this->session->set_flashdata('berhasil', 'Ubah Bab Pembelajaran');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}else{
					$this->session->set_flashdata('gagal', 'Ubah Bab Pembelajaran');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}
			}
		}
	}
	public function tambah_materi($id_bab = "",$id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['dataBab'] = $this->All_model->getBabWhere($id_bab);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['kelas'] = $this->All_model->getKelasWhere($id_kelas);
			$this->data['group'] = $group;
			$this->data['gabung'] = $this->All_model->getGabungUser($id, $id_kelas);
			$this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Materi', 'required|max_length[100]');
			$this->form_validation->set_rules('kategori', 'Kategori Materi', 'required');
			$this->form_validation->set_rules('link', 'Link Materi', 'required|valid_url');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('master/header', $this->data);
				$this->load->view('page/tambah_materi', $this->data);
				$this->load->view('master/footer', $this->data);
			} else {
				if($this->All_model->tambahMateriPembelajaran($id_bab)){
					$this->session->set_flashdata('berhasil', 'Tambah Materi Pembelajaran');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}else{
					$this->session->set_flashdata('gagal', 'Tambah Materi Pembelajaran');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}
			}
		}
	}
	public function ubah_materi($id_materi = "", $id_bab = "", $id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$this->data['dataBab'] = $this->All_model->getBabWhere($id_bab);
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['materi'] = $this->All_model->getMateriWhere($id_materi);
			$this->data['kelas'] = $this->All_model->getKelasWhere($id_kelas);
			$this->data['group'] = $group;
			$this->data['gabung'] = $this->All_model->getGabungUser($id, $id_kelas);
			$this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Materi', 'required|max_length[100]');
			$this->form_validation->set_rules('kategori', 'Kategori Materi', 'required');
			$this->form_validation->set_rules('link', 'Link Materi', 'required|valid_url');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('master/header', $this->data);
				$this->load->view('page/ubah_materi', $this->data);
				$this->load->view('master/footer', $this->data);
			} else {
				if ($this->All_model->ubahMateriPembelajaran($id_materi)) {
					$this->session->set_flashdata('berhasil', 'Ubah Materi Pembelajaran');
					redirect('home/kelas/' . $id_kelas, "refresh");
				} else {
					$this->session->set_flashdata('gagal', 'Ubah Materi Pembelajaran');
					redirect('home/kelas/' . $id_kelas, "refresh");
				}
			}
		}
	}
	public function hapus_bab($id_bab = "", $id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			if ($this->All_model->hapusBab($id_bab)) {
				$this->session->set_flashdata('berhasil', 'Hapus Bab Pembelajaran');
				redirect('home/kelas/' . $id_kelas, "refresh");
			} else {
				$this->session->set_flashdata('gagal', 'Hapus Bab Pembelajaran');
				redirect('home/kelas/' . $id_kelas, "refresh");
			}
		}
	}
	public function ajax_search(){

		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['kelas'] = $this->All_model->getKelasByCodeAjax($_POST['kode']);
			$this->load->view('page/ajax-data', $this->data);
		}
	}
	public function hapus_materi($id_materi = "", $id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			if ($this->All_model->hapusMateri($id_materi)) {
				$this->session->set_flashdata('berhasil', 'Hapus Materi Pembelajaran');
				redirect('home/kelas/' . $id_kelas, "refresh");
			} else {
				$this->session->set_flashdata('gagal', 'Hapus Materi Pembelajaran');
				redirect('home/kelas/' . $id_kelas, "refresh");
			}
		}
	}
	public function tambah_kelas()
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Kelas', 'required|max_length[100]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('master/header', $this->data);
				$this->load->view('page/tambah_kelas', $this->data);
				$this->load->view('master/footer', $this->data);
			} else {
				$string = "0123456789BCDFGHJKLMNPQRSTVWXYZ";
				$token = substr(str_shuffle($string), 0, 6);
				if ($this->All_model->tambahKelasBaru($token, $group[0]['first_name'])) {
					$cari_kelas = $this->All_model->getKelasByCode("#" . $token);
					if ($this->All_model->tambahAnggotaKelas($cari_kelas[0]['id_kelas'], $id, "Pemilik")) {
						$this->session->set_flashdata('berhasil', 'Tambah Kelas');
						redirect('home/kelas_saya/', "refresh");
					}
				} else {
					$this->session->set_flashdata('gagal', 'Tambah Kelas');
					redirect('home/kelas_saya/', "refresh");
				}
			}
		}
	}

	public function ubah_kelas($id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			$this->data['title'] = 'Beranda';
			$this->data['halaman'] = 'dashboard';
			$id = $_SESSION['user_id'];
			$group = $this->ion_auth_model->getGroup($id);
			$this->data['group'] = $group;
			$this->data['kelas'] = $this->All_model->getKelasWhere($id_kelas);
			$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Kelas', 'required|max_length[100]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('master/header', $this->data);
				$this->load->view('page/ubah_kelas', $this->data);
				$this->load->view('master/footer', $this->data);
			} else {
				if ($this->All_model->ubahKelasBaru($id_kelas)) {
					$this->session->set_flashdata('berhasil', 'Ubah Kelas');
					redirect('home/kelas_saya/', "refresh");
				} else {
					$this->session->set_flashdata('gagal', 'Ubah Kelas');
					redirect('home/kelas_saya/', "refresh");
				}
			}
		}
	}
	public function hapus_kelas($id_kelas = "")
	{
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		} else {
			if ($this->All_model->hapusKelas($id_kelas)) {
				$this->session->set_flashdata('berhasil', 'Hapus Kelas');
				redirect('home/kelas_saya/', "refresh");
			} else {
				$this->session->set_flashdata('gagal', 'Hapus Kelas');
				redirect('home/kelas_saya/', "refresh");
			}
		}
	}
}