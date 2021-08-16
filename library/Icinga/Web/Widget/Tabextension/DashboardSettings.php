<?php
/* Icinga Web 2 | (c) 2014 Icinga Development Team | GPLv2+ */

namespace Icinga\Web\Widget\Tabextension;

use Icinga\Web\Navigation\DashboardHome;
use Icinga\Web\Url;
use Icinga\Web\Widget\Tabs;

/**
 * Dashboard settings
 */
class DashboardSettings implements Tabextension
{
    /** @var array|null url params to be attached to the dropdown menus. */
    private $urlParam;

    /**
     * DashboardSettings constructor.
     *
     * @param array $urlParam
     */
    public function __construct(array $urlParam = [])
    {
        $this->urlParam = $urlParam;
    }

    /**
     * Apply this tabextension to the provided tabs
     *
     * @param Tabs $tabs The tabbar to modify
     */
    public function apply(Tabs $tabs)
    {
        $url = Url::fromPath(DashboardHome::BASE_PATH . '/new-dashlet');
        $tabs->addAsDropdown(
            'dashboard_add',
            array(
                'icon'      => 'dashboard',
                'label'     => t('Add Dashlet'),
                'url'       => empty($this->urlParam) ? $url : $url->addParams($this->urlParam)
            )
        );

        $url = Url::fromPath(DashboardHome::BASE_PATH . '/settings');
        $tabs->addAsDropdown(
            'dashboard_settings',
            array(
                'icon'      => 'dashboard',
                'label'     => t('Settings'),
                'url'       => empty($this->urlParam) ? $url : $url->addParams($this->urlParam)
            )
        );
    }
}
