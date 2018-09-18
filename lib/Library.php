<?php

class Library
{
	public static function is_valid_adresse_siege_social($value)
	{
		$is_valid = true;
		// Traitement de vérification de la valeur récupérée...
		if (!is_string($value)) {
			return false;
		}

		return $is_valid;
	}
	public static function is_valid_siret($value)
	{
		$is_valid = true;
		// Traitement de vérification de la valeur récupérée...
		if (!is_string($value)) {
			return false;
		}
		return $is_valid;
	}
	public static function is_valid_denomination($value)
	{
		$is_valid = true;
		// Traitement de vérification de la valeur récupérée...
		if (!is_string($value)) {
			return false;
		}
		return $is_valid;
	}
	public static function is_valid_chiffre_affaire($value)
	{
		$is_valid = true;
		// Traitement de vérification de la valeur récupérée...
		if (!is_float($value)) {
			return false;
		}

		return $is_valid;
	}

	public static function is_valid_id($value)
	{
		$is_valid = true;
		// Traitement de vérification de la valeur récupérée...
		if (!is_integer($value)) {
			return false;
		}

		return $is_valid;
	}
}