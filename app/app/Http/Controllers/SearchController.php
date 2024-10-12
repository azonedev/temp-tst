<?php

namespace App\Http\Controllers;

use App\DTO\SearchResultDTO;
use App\Enums\RegistrationStatus;
use App\Services\RegisterationService;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __construct(public RegisterationService $registeration)
    {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $nid = $request->get('nid');
        if(!$nid) return view('search');

        $status = RegistrationStatus::NOT_REGISTERED;

        $user = $this->registeration->getUserByNID($nid);
        if ($user) {
            $status = $this->registeration->getUserStatus($user->registration);
        }

        $searchResult = new SearchResultDTO(
            status: $status,
            nid: $nid,
            name: $user->name ?? null,
            center: $user->registration->center->name ?? null,
            location: $user->registration->center->location ?? null,
            scheduledDate: $user->registration->scheduled_date ?? null,
        );

        return view('search', compact('searchResult'));
    }
}
