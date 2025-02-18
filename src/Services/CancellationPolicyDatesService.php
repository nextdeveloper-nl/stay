<?php

namespace NextDeveloper\Stay\Services;

use NextDeveloper\Stay\Database\Models\CancellationPolicyDates;
use NextDeveloper\Stay\Services\AbstractServices\AbstractCancellationPolicyDatesService;

/**
 * This class is responsible from managing the data for CancellationPolicyDates
 *
 * Class CancellationPolicyDatesService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class CancellationPolicyDatesService extends AbstractCancellationPolicyDatesService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    public static function getByExternalId($externalId)
    {
        return CancellationPolicyDates::where('external_id', $externalId)->first();
    }
}