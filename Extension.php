<?php
namespace Extension\Copona\ElFinderFileManager;

// << Vendor/Extension_kkāds vai Vendor/Extension
use Copona\System\Library\Extension\ExtensionBase;

class Extension extends ExtensionBase {
    /**
     * Define details about extension
     * @return array
     */
    public function details() {
        return [
            'name'        => 'Elfinder File Manager', // Name, nosaukums.
            'description' => ''
        ];
    }

    public function initAdmin() {

        $location = 'admin/menu/design';

        $this->registry->get('hook')->setHook($location, [$this, 'addToAdminMenu']);
    }

    public function addToAdminMenu(&$data): void {

        $id = 'elfindermanager';
        $route = 'common/elfinder';
        $link_name = 'Elfinder File Manager';

        if ($this->registry->get('user')->hasPermission('access', $route)) {
            $data[] = [
                'id'       => $id,
                'icon'     => 'fa-tags',
                'name'     => '<span style="color: green;">' . $link_name . '</span>',
                'href'     => $this->registry->get('url')->link($route, 'token=' . $this->registry->get('session')->data('token'), true),
                'denied'   => ($this->registry->get('user')->hasPermission('access', $route) ? false : true), // available in the future. Taken from DEV repo.
                'children' => [],
            ];
        }
    }
}
