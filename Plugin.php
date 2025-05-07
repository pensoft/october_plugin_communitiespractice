<?php namespace Pensoft\CommunitiesPractice;

use Backend;
use System\Classes\PluginBase;

/**
 * CommunitiesPractice Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Communities Practice',
            'description' => 'No description provided yet...',
            'author'      => 'Pensoft',
            'icon'        => 'icon-child'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Pensoft\CommunitiesPractice\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'pensoft.communitiespractice.some_permission' => [
                'tab' => 'CommunitiesPractice',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'communitiespractice' => [
                'label'       => 'CoP',
                'url'         => Backend::url('pensoft/communitiespractice/communitiespractice'),
                'icon'        => 'icon-child',
                'permissions' => ['pensoft.communitiespractice.*'],
                'order'       => 500,
            ],
        ];
    }
}
