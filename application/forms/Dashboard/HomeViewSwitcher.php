<?php

namespace Icinga\Forms\Dashboard;

use Icinga\Web\Widget\Dashboard;
use ipl\Web\Compat\CompatForm;
use ipl\Web\Url;

class HomeViewSwitcher extends CompatForm
{
    /** @var Dashboard */
    private $dashboard;

    /** @var string */
    private $activeHome;

    public function __construct($dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function assemble()
    {
        $sortControls = $this->dashboard->getHomeKeyNameArray();

        if (Url::fromRequest()->getParam('home')) {
            $this->activeHome = Url::fromRequest()->getParam('home');
        }

        $this->addElement(
            'select',
            'sort_dashboard_home',
            [
                'class'          => 'autosubmit',
                'required'       => true,
                'label'          => t('Dashboard Home'),
                'multiOptions'   => $sortControls,
                'value'          => $this->activeHome ?: current($sortControls),
                'description'    => t('Select a dashboard home you want to see the dashboards from.')
            ]
        );
    }

    public function onSuccess()
    {
        // Do nothing
    }

    public function getHome()
    {
        return $this->activeHome;
    }
}
