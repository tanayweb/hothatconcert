<?php

namespace App\Providers;

use App\Models\CompanySettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            if (Route::getCurrentRoute()) {
                $url = Route::getCurrentRoute()->getCompiled()->getStaticPrefix();
                $url = substr($url, 1, strlen($url));
                $currentMenu = DB::table('menus')
                    ->where('url', 'like', $url . '%')
                    ->first();;
                if ($currentMenu) {
                    $menuChain = explode(',', $this->get_menu_chain($currentMenu->name, $currentMenu->parent));
                } else {
                    $menuChain = [];
                }
                $sideMenus = DB::table('menus');
                $sideMenus = $sideMenus->where('parent', '=', '0');
                $sideMenus = $sideMenus->where('status', '=', '1');
                $sideMenus = $sideMenus->orderBy('sort_order', 'ASC');
                $sideMenus = $sideMenus->get();
                $html = '';
                foreach ($sideMenus as $sideMenu) {
                    if(Auth::user()){
                        if(Auth::user()->role == 1){
                            if($sideMenu->name != 'PO'){
                                $childsName = $this->get_child_names($sideMenu->id);
                                if (in_array($sideMenu->name, $menuChain)) {
                                    $html .= '<li class="open active">';
                                } else {
                                    $html .= '
                                    <li>';
                                }
                                $html .= '<a href="' . URL::to($sideMenu->url) . '" title="' . $sideMenu->name . '" data-filter-tags="' . strtolower($sideMenu->name) . ' ' . $childsName . '">
                                    <i class="' . $sideMenu->icon . '"></i>
                                    <span class="nav-link-text" data-i18n="nav.' . str_replace(" ", '_', strtolower($sideMenu->name)) . '">' . $sideMenu->name . '</span>
                                </a>';
                                if ($this->get_child($sideMenu->id) != '') {
                                $html .= '<ul>';
                                    $html .= $this->get_child($sideMenu->id);
                                    $html .= '</ul>';
                                }
                                $html .= '</li>';
                            }
                        }elseif(Auth::user()->role == 4){ // This is the Report user who can only view user PO's 
                            if($sideMenu->name == 'Settings'){
                                $childsName = $this->get_child_names($sideMenu->id);
                                    if (in_array($sideMenu->name, $menuChain)) {
                                        $html .= '<li class="open active">';
                                    } else {
                                        $html .= '
                                        <li>';
                                    }
                                    $html .= '<a href="' . URL::to($sideMenu->url) . '" title="' . $sideMenu->name . '" data-filter-tags="' . strtolower($sideMenu->name) . ' ' . $childsName . '">
                                        <i class="' . $sideMenu->icon . '"></i>
                                        <span class="nav-link-text" data-i18n="nav.' . str_replace(" ", '_', strtolower($sideMenu->name)) . '">' . $sideMenu->name . '</span>
                                    </a>';
                                    if ($this->get_child_for_access($sideMenu->id) != '') { //This function only for restricting child menus to any specific user
                                    $html .= '<ul>';
                                        $html .= $this->get_child_for_access($sideMenu->id); //This function only for restricting child menus to any specific user
                                        $html .= '</ul>';
                                    }
                                    $html .= '</li>';
                            }
                        }else{
                            if($sideMenu->name == 'PO'){
                                $childsName = $this->get_child_names($sideMenu->id);
                                if (in_array($sideMenu->name, $menuChain)) {
                                    $html .= '<li class="open active">';
                                } else {
                                    $html .= '
                                    <li>';
                                }
                                $html .= '<a href="' . URL::to($sideMenu->url) . '" title="' . $sideMenu->name . '" data-filter-tags="' . strtolower($sideMenu->name) . ' ' . $childsName . '">
                                    <i class="' . $sideMenu->icon . '"></i>
                                    <span class="nav-link-text" data-i18n="nav.' . str_replace(" ", '_', strtolower($sideMenu->name)) . '">' . $sideMenu->name . '</span>
                                </a>';
                                if ($this->get_child($sideMenu->id) != '') {
                                $html .= '<ul>';
                                    $html .= $this->get_child($sideMenu->id);
                                    $html .= '</ul>';
                                }
                                $html .= '</li>';
                            }
                        }
                    }
                }
                $html .= '';
                $company = CompanySettings::first();
                View::share('sideMenu', $html);
                View::share('companySettings', $company);
            }
        });
    }
    public function get_child($id)
    {
        $currentMenu = DB::table('menus')
            ->where('url', 'like', request()->path() . '%')
            ->first();

        if ($currentMenu) {
            $menuChain = explode(',', $this->get_menu_chain($currentMenu->name, $currentMenu->parent));
        } else {
            $menuChain = [];
        }
        $html = '';
        $childs = DB::table('menus');
        $childs = $childs->where('parent', '=', $id);
        $childs = $childs->where('status', '=', '1');
        $childs = $childs->orderBy('sort_order', 'ASC');
        $childs = $childs->get();
        foreach ($childs as $child) {
            $childsName = $this->get_child_names($child->id);
            if (in_array($child->name, $menuChain)) {
                $html .= '<li class="active">';
            } else {
                $html .= '<li>';
            }
            $html .= '<a href="' . URL::to($child->url) . '" title="' . $child->name . '" data-filter-tags="' . strtolower($child->name) . ' ' . $childsName . '">
                        <i class="' . $child->icon . '"></i>
                        <span class="nav-link-text" data-i18n="nav.' . str_replace(" ", '_', strtolower($child->name)) . '">' . $child->name . '</span>
                    </a>';
            if ($this->get_child($child->id) != '') {
                $html .= '<ul>';
                $html .= $this->get_child($child->id);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }
    
    public function get_child_for_access($id) //This function only for restricting child menus to any specific user
    {
        $currentMenu = DB::table('menus')
            ->where('url', 'like', request()->path() . '%')
            ->first();

        if ($currentMenu) {
            $menuChain = explode(',', $this->get_menu_chain($currentMenu->name, $currentMenu->parent));
        } else {
            $menuChain = [];
        }
        $html = '';
        $childs = DB::table('menus');
        $childs = $childs->where('parent', '=', $id);
        $childs = $childs->where('status', '=', '1');
        $childs = $childs->where('id', '=', '31');// id = 31 is the newly added condition
        $childs = $childs->orderBy('sort_order', 'ASC');
        $childs = $childs->get();
        foreach ($childs as $child) {
            $childsName = $this->get_child_names($child->id);
            if (in_array($child->name, $menuChain)) {
                $html .= '<li class="active">';
            } else {
                $html .= '<li>';
            }
            $html .= '<a href="' . URL::to($child->url) . '" title="' . $child->name . '" data-filter-tags="' . strtolower($child->name) . ' ' . $childsName . '">
                        <i class="' . $child->icon . '"></i>
                        <span class="nav-link-text" data-i18n="nav.' . str_replace(" ", '_', strtolower($child->name)) . '">' . $child->name . '</span>
                    </a>';
            if ($this->get_child($child->id) != '') {
                $html .= '<ul>';
                $html .= $this->get_child($child->id);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }

    public function get_child_names($id)
    {
        $data = '';
        $childs = DB::table('menus')->where('parent', '=', $id)->get();
        foreach ($childs as $child) {
            $data .= strtolower($child->name) . ' ';
            $data .= $this->get_child_names($child->id, $child->name);
        }
        return $data;
    }

    public function get_menu_chain($name, $parent)
    {
        $builder = DB::table('menus');
        $builder->where('id', $parent);
        $child_data = $builder->first();
        if ($child_data) {
            return $this->get_menu_chain(
                $child_data->name,
                $child_data->parent
            ) . ',' . $name;
        } else {
            return $name;
        }
    }
}