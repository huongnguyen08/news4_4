<?php

include('controller.php');
include('model/ChitietTinModel.php');

class ChitietController extends Controller{

	

	public function getChitiettin(){
		$menu = $this->getMenu();
		$id_tin = $_GET['id'];
		$model = new ChitietTinModel;
		$tintuc = $model->getNewsDetail($id_tin);
		$comment = $model->getComment($id_tin);

		$arrayData = array('menu'=>$menu,'tintuc'=>$tintuc,'comment'=>$comment);

		return $this->loadView('chitiet',$arrayData);
	}

	public function postAddComment($idTinTuc, $idUser,$comment){
		$model = new  ChitietTinModel();
		$comment = $model->addComment($idTinTuc, $idUser,$comment);
		if($comment>0){
			$comments = $model->getCommentById($comment); //id
			return $this->getView('data_append',$comments);
		}
		else{
			return "Lỗi";
		}
		
	}



}


?>