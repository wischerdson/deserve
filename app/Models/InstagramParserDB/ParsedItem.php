<?php

namespace App\Models\InstagramParserDB;

use Illuminate\Database\Eloquent\Model;

class ParsedItem extends Model
{
	public $timestamps = false;

	protected $table = 'users';

	protected $connection = 'instagram_parser';

	protected static $unguarded = true;
}
