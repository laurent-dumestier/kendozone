<?php

namespace App\Http\Controllers\Api;

use App\Association;
use App\Club;
use App\Federation;


class AdministrativeStructureController extends ApiController
{

    public static function getFederations()
    {
        return Federation::orderBy('id', 'asc')->get(['id as value', 'name as text'])->toArray();
    }


    public static function getAssociations($federationId)
    {
        return Association::where('federation_id', $federationId)->orderBy('id', 'asc')->get(['id as value', 'name as text'])->toArray();

    }

    public static function getClubs($federationId, $associationId)
    {
        return Club::where('association_id', $associationId)
            ->get(['id as value', 'name as text'])->toArray();
    }

}
