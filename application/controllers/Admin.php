<?php

/**
 * 
 */
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_admin_all_level();
		$this->load->model('M_admin');
	}
	public function index()
	{
		$data['title'] = 'Aplikasi Pengaduan Masyarakat | Home';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->db->limit(5);
		$query = "SELECT * FROM tbl_pengaduan INNER JOIN tbl_masyarakat ON tbl_pengaduan.nik = tbl_masyarakat.nik ORDER BY id_pengaduan";
		$data['pengaduan'] = $this->db->query($query)->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
			'required' => 'Nama harus di isi',
			'min_length' => 'Nama min 3 huruf'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->edit_nama();
		}
	}

	public function edit_Telp()
	{
		$data['title'] = 'Edit No Telp';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('telp', 'telp', 'required|trim|min_length[11]|max_length[13]|is_unique[tbl_admin.no_telp]|numeric', [
			'required' => 'No telp harus di isi',
			'min_length' => 'No telp min 11 angka',
			'is_unique' => 'No telp sudah terdaftar, coba dengan no telp lain',
			'max_length' => 'No telp max 13 angka',
			'numeric' => 'No telp harus angka'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit_telp', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->edit_telp();
		}
	}

	public function edit_password()
	{
		$data['title'] = 'Edit Password';
		$data['pengguna'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('pl', 'pl', 'required|trim', ['required' => 'Password lama harus di si']);
		$this->form_validation->set_rules('pb', 'pb', 'required|trim|min_length[5]|matches[kpb]', [
			'required' => 'Password baru harus di isi',
			'min_length' => 'Password baru min 5 karakter',
			'matches' => 'Password baru harus sama dengan konfirmasi password baru',
		]);
		$this->form_validation->set_rules('kpb', 'kpb', 'required|trim|matches[pb]', [
			'required' => 'Konfirmasi password baru harus di isi',
			'matches' => 'Konfirmasi password baru harus sama dengan password baru',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit_pass', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->edit_password();
		}
	}

	public function laporan_pdf()
	{
		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	
	
	}
}
