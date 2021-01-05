<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductCategory;
use Modules\Shop\Entities\ProductCheckout;

class ShopController extends Controller
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

    public function category()
    {
        $title = "Product Categories";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_categories');
        $crud->setSubject('Product Category', 'Product Categories');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['name']);
        $crud->fields(['name']);
        $crud->requiredFields(['name']);
        $crud->uniqueFields(['name']);
        $crud->callbackAfterInsert(function ($s) {
            $data = ProductCategory::find($s->insertId);
            $data->slug = Str::slug($data->name);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = ProductCategory::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->name);
            $data->updated_at = now();
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index()
    {
        $title = "Products";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('products');
        $crud->setSubject('Product', 'Products');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetColumns(['slug', 'created_at', 'updated_at']);
        $crud->fields(['name', 'sku', 'price', 'product_category_id', 'short_description', 'long_description', 'tags', 'thumbnail', 'thumbnail2', 'status_id']);
        $crud->requiredFields(['name', 'sku', 'price', 'product_category_id', 'short_description', 'long_description', 'tags', 'thumbnail', 'thumbnail2', 'status_id']);
        $crud->uniqueFields(['name', 'sku']);
        $crud->setTexteditor(['long_description']);
        $crud->fieldType('price', 'numeric');
        $crud->setFieldUpload('thumbnail', 'storage', '../storage');
        $crud->setFieldUpload('thumbnail2', 'storage', '../storage');
        $crud->displayAs([
            'product_category_id' => 'Category',
            'sku' => 'SKU',
            'status_id' => 'Status',
            'thumbnail2' => 'Thumbnail 2'
        ]);
        $crud->setRelation('product_category_id', 'product_categories', 'name');
        $crud->setRelation('status_id', 'statuses', 'name');
        $crud->callbackAfterInsert(function ($s) {
            $data = Product::find($s->insertId);
            $data->slug = Str::slug($data->name);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Product::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->name);
            $data->updated_at = now();
            $data->save();

            return $s;
        });
        $crud->setActionButton('Images', 'fa fa-image', function ($row) {
            return route('shop.images', $row->id);
        }, true);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function images(Product $product)
    {
        $title = "Product Images of " . $product->name;
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_images');
        $crud->setSubject('Product Image', 'Product Images');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['image']);
        $crud->fields(['image']);
        $crud->requiredFields(['image']);
        $crud->setFieldUpload('image', 'storage', '../../../storage');
        $crud->callbackBeforeInsert(function ($s) use ($product) {
            $s->data['product_id'] = $product->id;

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function list()
    {
        $title = "Shopping List Admin";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_checkouts');
        $crud->setSubject('Shopping List', 'Shopping Lists');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetColumns(['created_at', 'updated_at']);
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->callbackColumn('jumlah', function ($value, $row) {
            return "Rp. " . number_format($value, 0, ',', '.');
        });
        $crud->callbackColumn('is_paid', function ($value, $row) {
            return ($value == 0) ? "Belum Dibayar" : "Sudah Dibayar";
        });
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple()->displayAs([
            'user_id' => 'Name',
            'is_paid' => 'Status'
        ]);
        $crud->setActionButton('Products', 'fa fa-shopping-cart', function ($row) {
            $d = ProductCheckout::find($row->id);
            return route('shop.products', $d->kode);
        }, true);
        $crud->defaultOrdering([
            'is_paid' => 'asc',
            'created_at' => 'desc'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function products($kode)
    {
        $title = "Products of " . $kode;
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple();
        $crud->unsetColumns(['kode', 'updated_at', 'checkout']);
        $crud->setTable('product_buys');
        $crud->setSubject('Product', 'Products');
        $crud->setSkin('bootstrap-v4');
        $crud->setRelation('product_id', 'products', 'name');
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->where([
            'kode' => $kode
        ]);
        $crud->callbackColumn('harga_satuan', function ($value, $row) {
            return "Rp. " . number_format($value, 0, ',', '.');
        });
        $crud->callbackColumn('harga_total', function ($value, $row) {
            return "Rp. " . number_format($value, 0, ',', '.');
        });
        $crud->displayAs([
            'product_id' => 'Product',
            'user_id' => 'Name'
        ]);
        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function daftar()
    {
        $title = "Shopping List";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('product_checkouts');
        $crud->setSubject('Shopping List', 'Shopping Lists');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetColumns(['created_at', 'updated_at', 'user_id']);
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->callbackColumn('jumlah', function ($value, $row) {
            return "Rp. " . number_format($value, 0, ',', '.');
        });
        $crud->callbackColumn('is_paid', function ($value, $row) {
            return ($value == 0) ? "Belum Dibayar" : "Sudah Dibayar";
        });
        $crud->unsetAdd()->unsetEdit()->unsetDelete()->unsetDeleteMultiple()->displayAs([
            'user_id' => 'Name',
            'is_paid' => 'Status'
        ]);
        $crud->setActionButton('Products', 'fa fa-shopping-cart', function ($row) {
            $d = ProductCheckout::find($row->id);
            return route('shop.produk', $d->kode);
        }, true);
        $crud->where([
            'user_id' => Auth::id()
        ]);
        $crud->defaultOrdering([
            'is_paid' => 'asc',
            'created_at' => 'desc'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
