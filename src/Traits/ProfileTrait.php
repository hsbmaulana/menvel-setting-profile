<?php

namespace Menvel\SettingProfile\Traits;

use Menvel\SettingProfile\Models\Profile;

trait ProfileTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function profile()
    {
        return $this->hasMany(Profile::class);
    }
}