<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->library('form_validation');
	}

	function getbarang()
	{
		$data = $this->api_model->get_barang();
		echo json_encode($data->result_array());
	}

	function getTerminal()
	{
		$data = $this->api_model->get_terminal();
		echo json_encode($data->result_array());
	}

	function barang_masuk()
	{
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required');
		if($this->form_validation->run())
		{
			$data = array(

				'id_barang' => $this->input->post('id_barang'),
				'nama_brg' => $this->input->post('nama_brg'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'jumlah' => $this->input->post('jumlah'),
				'no_dokumen_pabean' => $this->input->post('no_dokumen_pabean'),
				'tgl_dokumen_pabean' => $this->input->post('tgl_dokumen_pabean'),
				'id_satuan' => $this->input->post('id_satuan'),
				'id_client' => $this->input->post('id_client'),
				'terminal_terapung' => $this->input->post('terminal_terapung'),
				'no_job_order' => $this->input->post('no_job_order'),
				'nama_kapal' => $this->input->post('nama_kapal'),
				'id_subactivity' => $this->input->post('id_subactivity'),
        'created_at' => $this->input->post('created_at')

			);

			$this->api_model->insert_barang_masuk($data);

			$array = array(
				'success'		=>	true
			);

		}
		else
		{
			$array = array(
				'error'	=>	true,
				'jumlah' => form_error('jumlah')
			);
		}
		echo json_encode($array);
	}


}


?>
