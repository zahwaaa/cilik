<?php

namespace Modules\Kompetisi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Modules\Kompetisi\Entities\Competition;

class KompetisiController extends Controller
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
        $title = "Competitions";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('competitions');
        $crud->setSubject('Competition', 'Competitions');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetColumns(['created_at','updated_at']);
        $crud->unsetFields(['created_at','updated_at']);
        $crud->requiredFields(['name', 'description', 'start_date', 'end_date', 'ketentuan', 'rules', 'timeline', 'sponsor', 'hadiah', 'is_paid', 'status_id', 'thumbnail']);
        $crud->setFieldUpload('thumbnail', 'storage', '../storage');
        $crud->fieldType('is_paid', 'checkbox_boolean');
        $crud->fieldType('hadiah', 'numeric');
        $crud->setTexteditor(['description', 'ketentuan', 'rules', 'timeline']);
        $crud->setRelation('status_id', 'statuses', 'name');
        $crud->displayAs([
            'status_id' => 'Status',
            'is_paid' => 'Berbayar'
        ]);
        $crud->callbackColumn('hadiah', function ($value, $row) {
            return "Rp. " . number_format($value, 0, ',', '.');
        });
        $crud->callbackAfterInsert(function ($s) {
            $data = Competition::find($s->insertId);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Competition::find($s->primaryKeyValue);
            $data->updated_at = now();
            $data->save();

            return $s;
        });
        $crud->defaultOrdering('status_id');
        $crud->setActionButton('Participants', 'fa fa-users', function ($row) {
            return route('kompetisi.admin.members', $row->id);
        }, true);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function members($id)
    {
        $title = "Competition Members";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('competition_users');
        $crud->setSubject('Competition Members', 'Competition Members');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetAdd()->unsetEdit();
        $crud->displayAs([
            'competition_id' => 'Competition',
            'user_id' => 'Member',
            'is_paid' => 'Payment Status'
        ]);
        $crud->fieldType('is_paid', 'checkbox_boolean');
        $crud->setRelation('competition_id', 'competitions', 'name');
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->where('competition_id', $id);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function member()
    {
        $title = "My Competitions";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('competition_users');
        $crud->setSubject('My Competitions', 'My Competitions');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple();
        $crud->unsetColumns(['user_id']);
        $crud->displayAs([
            'competition_id' => 'Competition',
            'user_id' => 'Member',
            'is_paid' => 'Payment Status'
        ]);
        $crud->fieldType('is_paid', 'checkbox_boolean');
        $crud->setRelation('competition_id', 'competitions', 'name');
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->where('user_id', Auth::id());
        $crud->defaultOrdering('is_paid', 'desc');

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
