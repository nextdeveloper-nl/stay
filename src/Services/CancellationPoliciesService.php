<?php

namespace NextDeveloper\Stay\Services;

use NextDeveloper\Stay\Database\Models\CancellationPolicies;
use NextDeveloper\Stay\Services\AbstractServices\AbstractCancellationPoliciesService;

/**
 * This class is responsible from managing the data for CancellationPolicies
 *
 * Class CancellationPoliciesService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class CancellationPoliciesService extends AbstractCancellationPoliciesService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    public static function getByExternalId($externalId)
    {
        return CancellationPolicies::where('external_id', $externalId)->first();
    }
}