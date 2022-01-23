<?php

namespace App\Http\Controllers;

use App\Services\AmoCRM\AmoCRMService;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function orderCall(Request $request)
    {
        $amocrmService = new AmoCRMService();
        $amocrmClient = $amocrmService->getClient();
        $leadsService = $amocrmClient->leads();

        return $leadsService->get();
    }
}
