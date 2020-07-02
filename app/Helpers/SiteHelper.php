<?php
namespace App\Helpers;

use DB;

class SiteHelper
{
	public static function category(){
		$results = DB::table('category')->where('status', 1)->orderBy('name', 'ASC')->get();
		return $results;
	}

}