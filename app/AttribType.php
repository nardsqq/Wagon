<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AttribType extends Model
{
    public static $marine = ['NAME' => 'Marine', 'ID' => 1];
	public static $industrial = ['NAME' => 'Industrial', 'ID' => 2];
	public static $general = ['NAME' => 'General', 'ID' => 3];

	public static function attribtypes()
	{
		return collect([
			ATTRIBTYPE::$marine,
			ATTRIBTYPE::$industrial,
			ATTRIBTYPE::$general
			]);
	}

	public static function getName($id)
	{
		$attribtype = AttribType::attribtypes()->first ( function ($value, $key) use ($id) {
			return $value['ID'] == $id;
		});

		return $attribtype['NAME'];
	}
}
