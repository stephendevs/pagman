<?php
namespace Stephendevs\Pagman;

use Stephendevs\Pagman\Models\Menu\MenuItem;

trait MenuOrganiser {


    private function organiseMenuItem($menuItem)
    {
        if($menuItem->pivot->children != null){
            return array(
                'pivot_id' => $menuItem->pivot->id,
                'name' => $menuItem->name,
                'url' => 'parent page url',
                'children' => MenuItem::find(json_decode( $menuItem->pivot->children))
            );
        }
        return array(
            'pivot_id' => $menuItem->pivot->id,
            'name' => $menuItem->name,
            'url' => 'the page url',
            'children' => []
        );
    }

    private function getOrganisedMenuItems($menuItems)
    {
        $organisedMenuItems = [];

        if(count($menuItems)){
            foreach($menuItems as $menuItem){
                array_push(
                    $organisedMenuItems,
                    $this->organiseMenuItem($menuItem)
                );
            }
        }
        return $organisedMenuItems;
    }

}