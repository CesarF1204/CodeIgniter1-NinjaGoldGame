<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golds extends CI_Controller {

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
	public function index() {
		$this->load->view('ninja_gold_game/index.php');
	}
	public function process_money() {	
		$timestamp = date("F d,Y h:i:s A");
		$farm_gold = rand(10,20);
		$cave_gold = rand(5,10);
		$house_gold = rand(2,5);
		$casino_gold = rand(-50,50);

		if($this->input->post('action') == "farm") {
			$this->session->set_userdata('farm_gold', $farm_gold);
			$this->session->set_userdata('earned_gold', $this->session->userdata('farm_gold') + $this->session->userdata('earned_gold'));
			$this->session->set_userdata('activity', "<p class='earned-gold'>You have entered a farm and earned ".$this->session->userdata('farm_gold')." gold(s). ($timestamp)</p>");
		}
		
		if($this->input->post('action') == "cave") {
			$this->session->set_userdata('cave_gold', $cave_gold);
			$this->session->set_userdata('earned_gold', $this->session->userdata('cave_gold') + $this->session->userdata('earned_gold'));
			$this->session->set_userdata('activity', "<p class='earned-gold'>You have entered a cave and earned ".$this->session->userdata('cave_gold')." gold(s). ($timestamp)</p>");
		}
		if($this->input->post('action') == "house") {
			$this->session->set_userdata('house_gold', $house_gold);
			$this->session->set_userdata('earned_gold', $this->session->userdata('house_gold') + $this->session->userdata('earned_gold'));
			$this->session->set_userdata('activity', "<p class='earned-gold'>You have entered a house and earned ".$this->session->userdata('house_gold')." gold(s). ($timestamp)</p>");

		}
		if($this->input->post('action') == "casino") {
			$this->session->set_userdata('casino_gold', $casino_gold);
			if($this->session->userdata('casino_gold') > 0) {
		        $this->session->set_userdata('earned_gold', $this->session->userdata('casino_gold') + $this->session->userdata('earned_gold'));
		        $this->session->set_userdata('activity', "<p class='earned-gold'>You have entered a casino and earned ".$this->session->userdata('casino_gold')." gold(s). ($timestamp)</p>");
			} else {
		        $this->session->set_userdata('earned_gold', $this->session->userdata('casino_gold') + $this->session->userdata('earned_gold'));
		        $this->session->set_userdata('activity', "<p class='lost-gold'>You have entered a casino and lost ".$this->session->userdata('casino_gold')." gold(s). Ouch...($timestamp)</p>");
			}
		}
		//if your gold is a negative value then it will be 0
		if($this->session->userdata('earned_gold') <= 0) {
			$this->session->set_userdata('earned_gold', 0); 
		}
		
		$this->session->set_userdata('history', $this->session->userdata('activity') . $this->session->userdata('history'));
		redirect(base_url());
	}
}
