<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Modules\Slider\Entities\Banner;
use Modules\Slider\Entities\Slider;

class SliderController extends Controller
{
    private function _getDatabaseConnection() {
        $databaseConnection = config('database.default');
        $databaseConfig = config('database.connections.' . $databaseConnection);


        return [
            'adapter' => [
                'driver' => 'Pdo_Mysql',
                'database' => $databaseConfig['database'],
                'username' => $databaseConfig['username'],
                'password' => $databaseConfig['password'],
                'charset' => 'utf8'
            ]
        ];
    }

    private function _getGroceryCrudEnterprise() {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        return $crud;
    }

    private function _show_output($output, $title = '', $data = '') {
        if ($output->isJSONResponse) {
            return response($output->output, 200)
                  ->header('Content-Type', 'application/json')
                  ->header('charset', 'utf-8');
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;

        return view('grocery', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'title' => $title,
            'data' => $data
        ]);
    }

    public function index()
    {
        $title = "Sliders";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('sliders');
        $crud->setSubject('Slide', 'Sliders');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['title', 'sub_title', 'short_description', 'thumbnail']);
        $crud->fields(['title', 'sub_title', 'short_description', 'thumbnail' ,'url' ,'url_text']);
        $crud->requiredFields(['title', 'sub_title', 'short_description', 'thumbnail' ,'url' ,'url_text']);
        $crud->setFieldUpload('thumbnail', 'storage', '../storage');
        $crud->displayAs([
            'url' => 'Button Link',
            'url_text' => 'Button Text'
        ]);
        $crud->fieldType('url', 'url');
        $crud->callbackAfterInsert(function ($s) {
            $data = Slider::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Slider::find($s->primaryKeyValue);
            $data->updated_at = now();
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function banner()
    {
        $title = "Banners";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('banners');
        $crud->setSubject('Banner', 'Banners');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['name', 'image']);
        $crud->fields(['name', 'image' ,'url']);
        $crud->requiredFields(['name', 'image' ,'url']);
        $crud->setFieldUpload('image', 'storage', '../../storage');
        $crud->fieldType('url','url');
        $crud->displayAs([
            'url' => 'Link'
        ]);
        $crud->fieldType('url', 'url');
        $crud->callbackAfterInsert(function ($s) {
            $data = Banner::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Banner::find($s->primaryKeyValue);
            $data->updated_at = now();
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
