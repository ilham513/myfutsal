<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('akun_model');
		$this->load->model('crud_model');
	}

	public function index()
	{
		$data['jumlah_penyewa'] = $this->crud_model->menghitung_jumlah_row('penyewa');
		// var_dump($data);die();
		
		$this->load->view('admin_index', $data);
	}	

	public function view_jadwal()
	{
		$data['array_jadwal'] = $this->crud_model->mengambil_data('jadwal');
		// var_dump($data);die();
		
		$this->load->view('admin_view_jadwal',$data);
	}	
	
	public function view_absen_id($id)
	{
		//load model crud
		$data['array_log_absen'] = $this->crud_model->mengambil_data_join_id('log_absen',['siswa','kelas'],'id_absen',$id);
		// $data['obj_log_absen'] = $data['array_log_absen'][0];
		
		// var_dump($data);die();
		
		$this->load->view('admin_view_absen_id',$data);
	}	
	
	public function view_penyewa()
	{
		
		$data['array_penyewa'] = $this->crud_model->mengambil_data('penyewa');
		$this->load->view('admin_view_penyewa',$data);
	}	
	
	public function view_siswa()
	{
		$data['array_siswa'] = $this->crud_model->mengambil_data('siswa');
		
		$this->load->view('admin_view_siswa',$data);
	}	
	
	public function view_waktu_sewa()
	{
		$data['array_waktu_sewa'] = $this->crud_model->mengambil_data('waktu_sewa');
		
		$this->load->view('admin_view_waktu_sewa',$data);
	}	

	public function view_pencarian()
	{
		$data['array_kelas'] = $this->crud_model->mengambil_data('kelas');
		
		$this->load->view('admin_view_pencarian',$data);
	}	

	public function view_pencarian_go()
	{
		$array_siswa = $this->crud_model->mengambil_data('siswa');

		// echo substr($array_siswa[0]->nama_siswa,0,2);

		$cari = strtoupper($this->input->post('nama_siswa'));
		// echo strlen($cari);
		$ketemu = false;
		$list_index = array();

		for ($i = 0; $i < count($array_siswa); $i++){
			// echo strtoupper(substr($array_siswa[$i]->nama_siswa,0,2));
			if(strtoupper(substr($array_siswa[$i]->nama_siswa,0,strlen($cari))) == $cari){
				$ketemu = true;
				$list_index[] = $i;
			}
		}

		if ($ketemu){
			// echo "Data ditemukan sebanyak ".count($list_index);
		} else {
			echo '<script> alert("Data tidak ditemukan, harap tulis ulang!!"); </script>';

			//redirect
			redirect('/admin/view_pencarian', 'refresh');
		}
		
		foreach($list_index as $index){
			$data['array_siswa'][] = $array_siswa[$index];
		}
		
		// var_dump($data);
		$this->load->view('admin_view_pencarian_go',$data);
	}	

	public function add_penyewa()
	{
		// $data['array_pelajaran'] = $this->crud_model->mengambil_data('pelajaran');
		// $data['array_kelas'] = $this->crud_model->mengambil_data('kelas');
		
		$this->load->view('admin_add_penyewa',$data='');
	}	
	
	public function add_siswa()
	{
		$data['array_pelajaran'] = $this->crud_model->mengambil_data('pelajaran');
		$data['array_kelas'] = $this->crud_model->mengambil_data('kelas');
		
		$this->load->view('admin_add_siswa',$data);
	}	
	
	public function add_pelajaran()
	{
		$this->load->view('admin_add_pelajaran');
	}	
	
	public function add_waktu_sewa()
	{
		$this->load->view('admin_add_waktu_sewa');
	}	
	
	public function edit_jadwal($id)
	{
		//load model crud
		$data['array_jadwal'] = $this->crud_model->mengambil_data_id('jadwal','id_jadwal',$id);
		$data['obj_jadwal'] = $data['array_jadwal'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_edit_jadwal', $data);
	}	

	public function edit_waktu_sewa($id)
	{
		//load model crud
		$data['array_waktu_sewa'] = $this->crud_model->mengambil_data_id('waktu_sewa','id_waktu_sewa',$id);
		$data['obj_waktu_sewa'] = $data['array_waktu_sewa'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_edit_waktu_sewa', $data);
	}	

	public function edit_absen($id)
	{
		//load model crud
		$data['array_absen'] = $this->crud_model->mengambil_data_id('absen','id_absen',$id);
		$data['array_pelajaran'] = $this->crud_model->mengambil_data('pelajaran');
		$data['array_kelas'] = $this->crud_model->mengambil_data('kelas');
		$data['obj_absen'] = $data['array_absen'][0];

		// var_dump($data);die();

		$this->load->view('admin_edit_absen', $data);
	}	

	public function edit_penyewa($id)
	{
		//load model crud
		$data['array_penyewa'] = $this->crud_model->mengambil_data_id('penyewa','id_penyewa',$id);
		$data['obj_penyewa'] = $data['array_penyewa'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_edit_penyewa', $data);
	}	

	public function hapus_waktu_sewa($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('waktu_sewa','id_waktu_sewa',$id);

		//redirect
		redirect('/admin/view_waktu_sewa', 'refresh');
	}

	public function hapus_jadwal($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('jadwal','id_jadwal',$id);

		//redirect
		redirect('/admin/view_jadwal', 'refresh');
	}

	public function hapus_absen($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('absen','id_absen',$id);

		//redirect
		redirect('/admin/view_absen', 'refresh');
	}

	public function hapus_penyewa($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('penyewa','id_penyewa',$id);

		//redirect
		redirect('/admin/view_penyewa', 'refresh');
	}

	public function edit_pelajaran_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'nama_pelajaran' => $this->input->post('nama_pelajaran'),
			'nama_guru' => $this->input->post('nama_guru')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('pelajaran', $data,'id_pelajaran',$this->input->post('id_pelajaran'));
		
		//redirect
		redirect('/admin/view_pelajaran', 'refresh');
	}	
	
	public function edit_jadwal_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'nama_penyewa' => $this->input->post('nama_penyewa'),
			'waktu_sewa' => $this->input->post('waktu_sewa')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('jadwal', $data,'id_jadwal',$this->input->post('id_jadwal'));
		
		//redirect
		redirect('/admin/view_jadwal', 'refresh');
	}	
	
	public function edit_penyewa_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'nama_penyewa' => $this->input->post('nama_penyewa'),
			'no_telp' => $this->input->post('no_telp')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('penyewa', $data,'id_penyewa',$this->input->post('id_penyewa'));
		
		//redirect
		redirect('/admin/view_penyewa', 'refresh');
	}	
	
	public function edit_waktu_sewa_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'nama_hari' => $this->input->post('nama_hari'),
			'jam' => $this->input->post('jam')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('waktu_sewa', $data,'id_waktu_sewa',$this->input->post('id_waktu_sewa'));
		
		//redirect
		redirect('/admin/view_waktu_sewa', 'refresh');
	}	
	
	public function edit_absen_go()
	{
		// var_dump($_POST);

		//variabel data edit
		$data = array(
			'id_pelajaran' => $this->input->post('id_pelajaran'),
			'nama_guru' => $this->input->post('nama_guru'),
			'id_kelas' => $this->input->post('id_kelas'),
			'tanggal' => $this->input->post('tanggal'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('absen', $data,'id_absen',$this->input->post('id_absen'));
		
		//redirect
		redirect('/admin/view_absen', 'refresh');
	}	
	
	public function add_pelajaran_go()
	{
		// var_dump($_POST);
		
		//variabel data
		$data = array(
			'nama_pelajaran' => $this->input->post('nama_pelajaran'),
			'nama_guru' => $this->input->post('nama_guru')		
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('pelajaran', $data);
		
		//redirect
		redirect('/admin/view_pelajaran', 'refresh');
	}	
	
	public function add_penyewa_go()
	{
		// var_dump($_POST);
		
		//variabel data
		$data = array(
			'nama_penyewa' => $this->input->post('nama_penyewa'),
			'no_telp' => $this->input->post('no_telp')
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('penyewa', $data);
		
		//redirect
		redirect('/admin/view_penyewa', 'refresh');
	}	
	
	public function add_waktu_sewa_go()
	{
		// var_dump($_POST);
		
		//variabel data
		$jam = $this->input->post('jam1') . ' - '. $this->input->post('jam2');
		
		$data = array(
			'nama_hari' => $this->input->post('nama_hari'),
			'jam' => $jam		
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('waktu_sewa', $data);
		
		//redirect
		redirect('/admin/view_waktu_sewa', 'refresh');
	}	
	
	public function add_kelas_go()
	{
		// var_dump($_POST);
		
		//variabel data
		$data = array(
			'nama_kelas' => $this->input->post('nama_kelas'),
			'jumlah_murid' => $this->input->post('jumlah_murid')		
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('kelas', $data);
		
		//redirect
		redirect('/admin/view_kelas', 'refresh');
	}	
	
	public function reset_jadwal()
	{
		// var_dump($_POST);
		
		//tampilkan view
		$this->crud_model->mengosongkan_tabel('jadwal');
		
		//redirect
		redirect('/admin/view_jadwal', 'refresh');
	}	

	public function algoritma_genetika()
	{
		set_time_limit(120);
		$this->load->model('m_admin');
		$data['penyewa'] = $this->crud_model->mengambil_data('penyewa');
		$data['waktu'] = $this->crud_model->mengambil_data('waktu_sewa');

		$this->load->view('v_admin_jadwal_otomatis',$data);	

		//redirect
		// redirect('/admin/view_jadwal', 'refresh');		
	}	
}