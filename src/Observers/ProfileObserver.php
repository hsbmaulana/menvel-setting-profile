<?php

namespace Menvel\SettingProfile\Observers;

use Menvel\SettingProfile\SettingProfileServiceProvider;
use Menvel\SettingProfile\Contracts\Repository\ISettingProfileRepository;

class ProfileObserver
{
    /**
     * @var \Menvel\SettingProfile\Contracts\Repository\ISettingProfileRepository
     */
    protected $profile;

    /**
     * @param \Menvel\SettingProfile\Contracts\Repository\ISettingProfileRepository $profile
     * @return void
     */
    public function __construct(ISettingProfileRepository $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return void
     */
    public function __destruct()
    {}

    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable $data
     * @return void
     */
    public function created($data)
    {
        $this->profile->setUser($data);

        $this->profile->setPhoto(SettingProfileServiceProvider::$photo);
        $this->profile->setBackground(SettingProfileServiceProvider::$background);
        $this->profile->setHeaderground(SettingProfileServiceProvider::$headerground);
        $this->profile->setFooterground(SettingProfileServiceProvider::$footerground);
    }
}