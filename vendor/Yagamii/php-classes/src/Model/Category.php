<?php

namespace Yagamii\Model;

use \Yagamii\Model;
use \Yagamii\DB\Sql;
use \Yagamii\Mailer;

class Category extends Model {

	protected $fields = [
		"idcategory", "descategory"
	];

	public static function listAll(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(
				":idcategory"=>$this->getidcategory(),
				":descategory"=>$this->getdescategory()
));

		$this->setData($results[0]);

	}

}

 ?>