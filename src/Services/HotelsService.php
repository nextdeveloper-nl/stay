<?php

namespace NextDeveloper\Stay\Services;

use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\Stay\Database\Models\Hotels;
use NextDeveloper\Stay\Services\AbstractServices\AbstractHotelsService;

/**
 * This class is responsible from managing the data for Hotels
 *
 * Class HotelsService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class HotelsService extends AbstractHotelsService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    /**
     * This method returns the model by external id.
     *
     * @param $externalId
     * @return Hotels|null
     */
    public static function getByExternalId($externalId): ?Hotels
    {
        return Hotels::where('external_id', $externalId)->first();
    }
}