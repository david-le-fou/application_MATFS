<?php    
    
    $url_lp='url matsf';
    include "qrlib.php";    
    class Qr_code{
        public function generate_code($mypath,$myfile){
            $PNG_TEMP_DIR = $_SERVER['DOCUMENT_ROOT'].'/MATSF/drh2/assets/images/qrcode/';


            $PNG_WEB_DIR = base_url('assets/images/qrcode/');


            if (!file_exists($PNG_TEMP_DIR))
                //mkdir($PNG_TEMP_DIR);
            $filename = $PNG_TEMP_DIR.'enjana.png';
            $errorCorrectionLevel = 'L';


            if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H'))){
                $errorCorrectionLevel = $_REQUEST['level'];    
            }
                else{
                    $_REQUEST['level']='X';
                }
            $matrixPointSize = 4;
            if (isset($_REQUEST['size'])){
                $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
            }
                else{
                    $_REQUEST['size']=8;
                }
              
                $_REQUEST['data']=$mypath.$myfile;
                if (trim($_REQUEST['data']) == '')
                    die('data cannot be empty! <a href="?">back</a>');
                $filename = $PNG_TEMP_DIR.$myfile.'.png';
                QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
            
            //echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';  
        }
    }
    
   

    