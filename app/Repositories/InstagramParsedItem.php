<?php

namespace App\Repositories;

use App\Models\InstagramParserDB\ParsedItem;
use Illuminate\Support\Facades\DB;

class InstagramParsedItem
{
	public function findByPhone(string $phone): ?ParsedItem
	{
		$subquery = ParsedItem::select(['id', DB::raw(<<<'EOD'
			(case
				when whatsapp_number <> '' && whatsapp_number is not null
					then substr(whatsapp_number, 2)
				else
					concat(public_phone_country_code, public_phone_number)
			end) as phone
		EOD)])
			->where(function ($query) {
				$query->where('contact_phone_number', '<>', '')
					->whereNotNull('contact_phone_number');
			})->orWhere(function ($query) {
				$query->where('whatsapp_number', '<>', '')
					->whereNotNull('whatsapp_number');
			});

		$recordByPhone = DB::connection('instagram_parser')
			->table($subquery, 'filtered_users')
			->where('phone', $phone)->first();

		if ($recordByPhone) {
			return ParsedItem::find($recordByPhone->id);
		}

		return null;
	}
}
