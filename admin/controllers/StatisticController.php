<?php 
	include "Models/StatisticModel.php";
	class StatisticController extends Controller{
		use StatisticModel;
		//ham tao de xac thuc dang nhap
		public function __construct(){
			$this->authentication();
		}
		public function index(){
			//goi view, truyen du lieu ra view
            $formAction = "index.php?controller=statistic&action=process";
            // echo "---------";
			$this->loadView("statistic.php",["formAction"=>$formAction]);
		}
        public function process(){
            // echo $_POST["start"];
            $formAction = "index.php?controller=statistic&action=process";
            $start = date_format(date_create($_POST["start"]),"Y/m/d H:i:s");
            $end = date_format(date_create($_POST["end"]),"Y/m/d H:i:s");
            $revenue = $this->revenue($start,$end);
            $data = NULL;
            if($revenue!=NULL){
                $data = $this->listOrder($start,$end);
            }else{
                $revenue = 0; 
            }
            $this->loadView("statistic.php",["formAction"=>$formAction,"start"=>$_POST["start"],"end"=>$_POST["end"],"revenue"=>$revenue,"data"=>$data]);
        }
	}
 ?>