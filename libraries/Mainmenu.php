<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmenu {
	

	public function menu($parent=0,$hasil){

			$w = $this->db->query("SELECT * from ref_module where id_parent='".$parent."'");
			if(($w->num_rows())>0)
			{
				$hasil .= "<ul>";
			}
			foreach($w->result() as $h)
			{

				$hasil .= "<li>".$h->name_module;
				$hasil = $this->menu($h->id_module,$hasil);
				$hasil .= "</li>";
			}
			if(($w->num_rows)>0)
			{
				$hasil .= "</ul>";
			}
			return $hasil;
		}


}