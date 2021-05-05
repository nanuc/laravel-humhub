<?php

namespace Nanuc\LaravelHumHub\Models;

use Nanuc\LaravelHumHub\Facades\HumHub;

class Space
{
    // https://github.com/humhub/humhub/blob/master/protected/humhub/modules/space/models/Space.php

    // Join Policies
    const JOIN_POLICY_NONE = 0; // No Self Join Possible
    const JOIN_POLICY_APPLICATION = 1; // Invitation and Application Possible
    const JOIN_POLICY_FREE = 2; // Free for All
    // Visibility: Who can view the space content.
    const VISIBILITY_NONE = 0; // Private: This space is invisible for non-space-members
    const VISIBILITY_REGISTERED_ONLY = 1; // Only registered users (no guests)
    const VISIBILITY_ALL = 2; // Public: All Users (Members and Guests)

    public function __construct(
        public $id,
        public $guid = null,
        public $name = null,
        public $url = null,
        public $description = null,
        public $visibility = self::VISIBILITY_REGISTERED_ONLY,
        public $joinPolicy = self::JOIN_POLICY_APPLICATION,
        public $tags = null,
        public $status = null,
    ){}

    public function get($key)
    {
        if(is_null($this->$key)) {
            $model = HumHub::space()->getSpaceById($this->id);
            foreach(get_object_vars($model) as $aKey => $aValue) {
                $this->$aKey = $aValue;
            }
        }

        return $this->$key;
    }

    public function getContentContainer()
    {
        return HumHub::content()
            ->findAllContentContainer()
            ->where('guid', $this->get('guid'))
            ->first();
    }

    public function update($data)
    {
        return HumHub::space()->updateExistingSpace($this->id, $data);
    }
}
