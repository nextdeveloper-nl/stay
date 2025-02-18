<?php

namespace NextDeveloper\Stay\Services;

use NextDeveloper\Stay\Database\Models\AgencyGroups;
use NextDeveloper\Stay\Services\AbstractServices\AbstractAgencyGroupsService;

/**
 * This class is responsible from managing the data for AgencyGroups
 *
 * Class AgencyGroupsService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class AgencyGroupsService extends AbstractAgencyGroupsService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    public static function getByExternalId($externalId): ?AgencyGroups
    {
        return AgencyGroups::where('external_id', $externalId)->first();
    }
}