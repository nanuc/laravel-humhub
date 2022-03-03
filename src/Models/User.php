<?php

namespace Nanuc\LaravelHumHub\Models;

class User
{
    // https://github.com/humhub/humhub/blob/master/protected/humhub/modules/user/models/User.php

    // Status flags
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    const STATUS_NEED_APPROVAL = 2;
    const STATUS_SOFT_DELETED = 3;

    // Visibility modes
    const VISIBILITY_REGISTERED_ONLY = 1; // Only for registered members
    const VISIBILITY_ALL = 2; // Visible for all (also guests)

    public function __construct(
        public $id,
        public $guid = null,
        public $status = null,
        public $username = null,
        public $email = null,
        public $displayName = null,
        public $url = null,
    ){}
}
