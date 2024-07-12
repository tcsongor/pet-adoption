<?php

namespace App\Constants;

class RouteURLs
{
    public const PETS_ENDPOINT = '/api/pets';
    public const PETS_ENDPOINT_WITH_ID = '/api/pets/{' . RouteURLs::PARAM_PET_ID . '}';

    public const PARAM_PET_ID = 'pet_id';
}
