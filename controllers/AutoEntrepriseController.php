<?php

require_once './controllers/RestController.php';
require_once './models/AutoEntrepriseModel.php';

class AutoEntrepriseController extends RestController
{
	public function getDetail_request($id)
	{
		$entreprise = new AutoEntreprise;
		$entreprise = $entreprise->getOne($id);

		$data = [];
		foreach ($entreprise->fields as $attribut => $getter) {
			if(array_key_exists($attribut, $entreprise->fields)) {
				$data[$attribut] = $entreprise->$getter();
			}
		}
		echo json_encode($data);
	}

	public function getAll_request()
	{
		$entreprises = new AutoEntreprise;
		$entreprises = $entreprises->getAll();

		foreach ($entreprises as $key => $entreprise) {
			$data[$entreprise->getEntrepriseId()] = [];
			foreach ($entreprise->fields as $attribut => $getter) {
				if(array_key_exists($attribut, $entreprise->fields)) {
					$data[$entreprise->getEntrepriseId()][$attribut] = $entreprise->$getter();
				}
			}
		}
		echo json_encode($data);
	}

	public function getSelected_request($ids)
	{

	}

	public function add_request($post)
	{

	}

	public function update_request($id)
	{

	}

	public function delete_request($id)
	{

	}
}