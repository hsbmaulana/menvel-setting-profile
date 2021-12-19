<?php

namespace Menvel\SettingProfile;

use Menvel\SettingProfile\Observers\ProfileObserver;
use Menvel\Repository\RepositoryServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class SettingProfileServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    public static $photo = null;

    /**
     * @var string
     */
    public static $background = null;

    /**
     * @var string
     */
    public static $headerground = null;

    /**
     * @var string
     */
    public static $footerground = null;

    /**
     * @var array
     */
    protected $map =
    [
        \Menvel\SettingProfile\Contracts\Repository\ISettingProfileRepository::class => \Menvel\SettingProfile\Repositories\Eloquent\SettingProfileRepository::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->dataEventListener();
    }

    /**
     * @return void
     */
    public function dataEventListener()
    {
        call_user_func(Auth::guard()->getProvider()->getModel() . '::' . 'observe', ProfileObserver::class);
    }
}