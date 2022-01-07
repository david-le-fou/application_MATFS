<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
include 'htmltopdf/index.php';
class Topdf extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Personnel_model');
		}
	public function index(){
        convert('test',"http://www.david.com/drh2/index.php/topdf/content_html");
	}
    public function content_html(){
        $width = 100;
        $this->style();
        //http://www.david.com/drh2/index.php/topdf/content_html
        foreach ($this->Personnel_model->maka_donnees_badge() as $value) {
            echo "<div>";
            echo "<p>matricule = ".$value->matricule ."</p>";
            echo "<p>nom = ".$value->nom ."</p>";
            echo "<p>prenom = ".$value->prenoms ."</p>";
            echo "<p>direction = ".$value->id_direction ."</p>";
            echo "<p>service = ".$value->id_service ."</p>";
            echo "<p>code = ".$value->code_profil ."</p>";
            echo "<img width='$width' heigth='$width'src='".base_url('assets/images/profil_pics/'.$value->photo)."'/>";
            echo "<img width='$width' heigth='$width'src='".base_url('assets/images/qrcode/'.$value->matricule).".png'/>";
            echo "</div>";

        /*
            $test->setCellValue('F'.$i, $value->photo);
            $test->setCellValue('G'.$i, $value->matricule);
        */
        }
    }
    private function style() {
        ?>
        <style>
            @page { margin: 0px; }
            body { margin: 0px; }
            /* div {
                float: left;
                margin: 10px;
            } */
            p{
                color:red;
                font-size: 11px;
            }
        </style>
        <?php
    }

}
