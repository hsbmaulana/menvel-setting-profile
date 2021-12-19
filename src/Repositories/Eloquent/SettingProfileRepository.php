<?php

namespace Menvel\SettingProfile\Repositories\Eloquent;

use Error;
use Exception;
use Illuminate\Support\Facades\DB;
use Menvel\Repository\AbstractRepository;
use Menvel\SettingProfile\Events\Profiling;
use Menvel\SettingProfile\Events\Profiled;
use Menvel\Setting\Contracts\Repository\ISettingRepository;
use Menvel\SettingProfile\Contracts\Repository\ISettingProfileRepository;

class SettingProfileRepository extends AbstractRepository implements ISettingProfileRepository
{
    /**
     * @var string
     */
    protected $space;

    /**
     * @var \Menvel\Setting\Contracts\Repository\ISettingRepository
     */
    protected $setting;

    /**
     * @param \Menvel\Setting\Contracts\Repository\ISettingRepository $setting
     * @return void
     */
    public function __construct(ISettingRepository $setting)
    {
        $this->space = StrictScope::$space . '.' . 'profile';
        $this->setting = $setting;
    }

    /**
     * @return void
     */
    public function __destruct()
    {}

    /**
     * @param array $querystring
     * @return mixed
     */
    public function all($querystring = [])
    {
        $user = $this->user; $content = null;

        $content = $user->load('profile')->loadCount('profile');

        return $content;
    }

    /**
     * @param int|string|null $identifier
     * @param array $data
     * @return mixed
     */
    public function modify($identifier, $data)
    {
        $this->setting->setUser($this->getUser());

        $content = $this->setting->setup($this->space . '.' . $identifier, $data);

        event(new Profiled($content));

        return $content;
    }

    /**
     * @param string $url
     * @return mixed
     */
    public function setPhoto($url)
    {
        return $this->modify('photo', $url);
    }

    /**
     * @param string $url
     * @return mixed
     */
    public function setBackground($url)
    {
        return $this->modify('background', $url);
    }

    /**
     * @param string $url
     * @return mixed
     */
    public function setHeaderground($url)
    {
        return $this->modify('headerground', $url);
    }

    /**
     * @param string $url
     * @return mixed
     */
    public function setFooterground($url)
    {
        return $this->modify('footerground', $url);
    }
}