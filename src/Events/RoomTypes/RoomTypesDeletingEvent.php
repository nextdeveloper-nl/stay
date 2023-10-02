<?php

namespace NextDeveloper\Stay\Events\RoomTypes;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Stay\Database\Models\RoomTypes;

/**
 * Class RoomTypesDeletingEvent
 *
 * @package NextDeveloper\Stay\Events
 */
class RoomTypesDeletingEvent
{
    use SerializesModels;

    /**
     * @var RoomTypes
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(RoomTypes $model = null)
    {
        $this->_model = $model;
    }

    /**
     * @param int $value
     *
     * @return AbstractEvent
     */
    public function setTimestamp($value)
    {
        $this->timestamp = $value;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}