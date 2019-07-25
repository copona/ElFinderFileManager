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

        $this->hook = $this->registry->get('hook');
        $this->hook->setHook('admin/menu/design', [$this, 'addElfinderToAdminMenu']);
    }


    public function addElfinderToAdminMenu(&$data): void {

        $this->user = $this->registry->get('user');
        $this->url = $this->registry->get('url');
        $this->session = $this->registry->get('session');

        // $data[]['elfinder_manager'] = [
        $data[] = [
          'id'       => 'elfindermanager',
          'icon'     => 'fa-tags',
          'name'     => "<span style='color: green;'>Elfinder File Manager</span>",
            // 'target' => "_blank",
          'denied'   => ($this->user->hasPermission('access', 'extension/module/country_of_the_day') ? false : true),
          'href'     => $this->url->link("common/elfinder", "&token=" . $this->session->data['token']),
          'children' => []
        ];

        // prd($data);

    }


}
