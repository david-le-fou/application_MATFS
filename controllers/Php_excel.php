
<?php
ini_set("memory_limit","-1");
defined('BASEPATH') OR exit ('No direct script access allowed');

class Php_excel extends CI_Controller{

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Personnel_model');
		}
	public function index(){
		?>
		<form action="" methode="get">
			Nom du fichier <input type="text" name="export" id="export">
			<button type="submit">Exporter</button>
		</form>
		<?php
	}
	public function traite_image($type, $images){
		if($type == 'qrcode'){
			$chemin = 'images/qrcode';
		}
		if($type == 'profil_pics'){
			$chemin = 'images/profil_pics';
		}
		$result = explode('.', $images);
			if($result[1] == 'png'){
			$file = base_url('assets/'.$chemin.'/'.$result[0].'.'.$result[1]);
			if($this->url_exists($file)) return imagecreatefrompng($file);
			else return null;
		}
		if($result[1] == 'jpg' or $result[1] == 'jpeg' or $result[1] == 'JPG'){
			$file = base_url('assets/'.$chemin.'/'.$result[0].'.'.strtoupper($result[1]));
			if($this->url_exists($file)) return imagecreatefromjpeg($file);
			else return null;
			
		}
	}
	public function result_requete_personel(){
		return $this->Personnel_model->maka_donnees_badge();
	}
	public function url_exists($url) {
		$hdrs = @get_headers($url);
		return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
	}
}

	$nomfichier = 'test';

	$image = new Php_excel();
	/*var_dump($image->result_requete_personel());*/
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

	/** Include PHPExcel */
	require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
	

	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("ANDRIAMASINAVALONA Davidson")
								->setLastModifiedBy("enjana")
								->setTitle("$nomfichier")
								->setSubject("$nomfichier")
								->setDescription("$nomfichier enjana")
								->setKeywords("$nomfichier")
								->setCategory("$nomfichier");
	$data_head_excel = array("A1" => "Matricule",
							"B1" => "Nom",
							"C1" => "Prenom",
							"D1" => "Direction",
							"E1" => "Service",
							"F1" => "Photo",
							"G1" => "QR_code",
							"H1" => "Code d'acces");

	function image_integre($obj_image,  $obj_phpexcel, $type_image , $nom_image , $nom_champ, $description, $height, $position){
		$gdImage = $obj_image->traite_image($type_image ,$nom_image);
			// Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
			$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
			$objDrawing->setName($nom_champ);
			$objDrawing->setDescription($description);
			$objDrawing->setImageResource($gdImage);
			$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
			$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
			$objDrawing->setHeight($height);
			$objDrawing->setCoordinates($position);
			$objDrawing->setWorksheet($obj_phpexcel->getActiveSheet());
	}


	$test = $objPHPExcel->setActiveSheetIndex(0);
	foreach ($data_head_excel as $nom_champ => $value) {
		$test->setCellValue($nom_champ, $value);
	}
	$i = 2;
	foreach ($image->result_requete_personel() as $value) {
		# code...
		$test->setCellValue('A'.$i, $value->matricule);
		$test->setCellValue('B'.$i, $value->nom);
		$test->setCellValue('C'.$i, $value->prenoms);
		$test->setCellValue('D'.$i, $value->id_direction);
		$test->setCellValue('E'.$i, $value->id_service);
		$test->setCellValue('H'.$i, $value->code_profil);
	/*
		$test->setCellValue('F'.$i, $value->photo);
		$test->setCellValue('G'.$i, $value->matricule);
	*/
		image_integre($image, $objPHPExcel, 'qrcode',$value->matricule.'.png', 'QR_'.$value->matricule , 'QR_'.$value->matricule, 50, 'G'.$i);
		image_integre($image, $objPHPExcel, 'profil_pics',$value->photo, $value->matricule , $value->nom.$value->prenoms, 50, 'F'.$i );

		$i++;
	}
			

	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle("$nomfichier");
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header("Content-Disposition: attachment;filename=$nomfichier.xlsx");
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;