<?php

require_once './controllers/RestController.php';
require_once './models/SocieteActionSimplifieModel.php';

class SocieteActionSimplifieController extends RestController
{
	public function getDetail_request($id)
	{
		$entreprise = new SocieteActionSimplifie;
		$entreprise = $entreprise->getOne($id);

		$data = [];
		foreach ($entreprise->fields as $attribut => $getter) {
			if(array_key_exists($attribut, $entreprise->fields)) {
				$data[$attribut] = $entreprise->$getter();
			}
		}

		// L'impôt est uniquement calculé, et n'est jamais stocké
		$data['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
		echo json_encode($data);
	}

	public function getAll_request()
	{
		$entreprises = new SocieteActionSimplifie;
		$entreprises = $entreprises->getAll();

		foreach ($entreprises as $key => $entreprise) {
			$data[$entreprise->getEntrepriseId()] = [];
			foreach ($entreprise->fields as $attribut => $getter) {
				if(array_key_exists($attribut, $entreprise->fields)) {
					$data[$entreprise->getEntrepriseId()][$attribut] = $entreprise->$getter();
				}
			}

			// L'impôt est uniquement calculé, et n'est jamais stocké
			$data[$entreprise->getEntrepriseId()]['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
		}
		echo json_encode($data);
	}

	public function add_request($post = [])
	{
		$entreprise = new SocieteActionSimplifie($post);
		$entreprise->add();
	}

	public function update_request($id, $patch)
	{
		$entreprise = new SocieteActionSimplifie($patch);
		$entreprise->update($id);
	}

	public function delete_request($id)
	{
		$entreprise = new SocieteActionSimplifie;
		$entreprise->delete($id);
	}
}