<?php

namespace Modules\Article\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Article\Entities\Article;
use Modules\Article\Entities\ArticleCategory;
use Modules\Article\Entities\ArticleComment;

class ArticleController extends Controller
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
        $title = "Article Categories";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('article_categories');
        $crud->setSubject('Category Article', 'Category Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['name']);
        $crud->fields(['name']);
        $crud->uniqueFields(['name']);
        $crud->requiredFields(['name']);
        $crud->callbackAfterInsert(function ($s) {
            $data = ArticleCategory::find($s->insertId);
            $data->slug = Str::slug($data->name);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = ArticleCategory::find($s->primaryKeyValue);
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
        $title = "Pending Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['title', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->fields(['title', 'content', 'thumbnail', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->editFields(['article_status_id']);
        $crud->uniqueFields(['title']);
        $crud->requiredFields(['article_status_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->where([
            'article_status_id' => 2
        ]);
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackAfterInsert(function ($s) {
            $data = Article::find($s->insertId);
            $data->slug = Str::slug($data->title);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->title);
            $data->updated_at = now();
            $data->save();

            $user = User::find($data->user_id);

            switch ($data->article_status_id) {
                case '3':
                    $user->score += config('app.published');
                    break;

                case '4':
                    $user->score -= config('app.rejected');
                    break;

                case '5':
                    $user->score -= config('app.deleted');
                    break;

                default:
                    # code...
                    break;
            }

            $user->save();

            return $s;
        });
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index_published()
    {
        $title = "Published Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['title', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->fields(['title', 'content', 'thumbnail', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->editFields(['article_status_id']);
        $crud->requiredFields(['article_status_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->uniqueFields(['title']);
        $crud->where([
            'article_status_id' => 3
        ]);
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackAfterInsert(function ($s) {
            $data = Article::find($s->insertId);
            $data->slug = Str::slug($data->title);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->title);
            $data->updated_at = now();
            $data->save();

            $user = User::find($data->user_id);

            switch ($data->article_status_id) {
                case '3':
                    $user->score += config('app.published');
                    break;

                case '4':
                    $user->score -= config('app.rejected');
                    break;

                case '5':
                    $user->score -= config('app.deleted');
                    break;

                default:
                    # code...
                    break;
            }

            $user->save();

            return $s;
        });
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index_rejected()
    {
        $title = "Rejected Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['title', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->fields(['title', 'content', 'thumbnail', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->editFields(['article_status_id']);
        $crud->requiredFields(['article_status_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->uniqueFields(['title']);
        $crud->where([
            'article_status_id' => 4
        ]);
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackAfterInsert(function ($s) {
            $data = Article::find($s->insertId);
            $data->slug = Str::slug($data->title);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->title);
            $data->updated_at = now();
            $data->save();

            $user = User::find($data->user_id);

            switch ($data->article_status_id) {
                case '3':
                    $user->score += config('app.published');
                    break;

                case '4':
                    $user->score -= config('app.rejected');
                    break;

                case '5':
                    $user->score -= config('app.deleted');
                    break;

                default:
                    # code...
                    break;
            }

            $user->save();

            return $s;
        });
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function index_deleted()
    {
        $title = "Deleted Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->columns(['title', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->fields(['title', 'content', 'thumbnail', 'user_id', 'article_status_id', 'article_category_id']);
        $crud->editFields(['article_status_id']);
        $crud->requiredFields(['article_status_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->uniqueFields(['title']);
        $crud->where([
            'article_status_id' => 5
        ]);
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackAfterInsert(function ($s) {
            $data = Article::find($s->insertId);
            $data->slug = Str::slug($data->title);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->updated_at = now();
            $data->slug = Str::slug($data->title);
            $data->save();

            $user = User::find($data->user_id);

            switch ($data->article_status_id) {
                case '3':
                    $user->score += config('app.published');
                    break;

                case '4':
                    $user->score -= config('app.rejected');
                    break;

                case '5':
                    $user->score -= config('app.deleted');
                    break;

                default:
                    # code...
                    break;
            }

            $user->save();

            return $s;
        });
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function article_member()
    {
        $title = "My Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetDeleteMultiple();
        $crud->columns(['title', 'article_status_id', 'article_category_id']);
        $crud->fields(['title', 'content', 'article_status_id', 'article_category_id']);
        $crud->requiredFields(['title', 'content', 'article_status_id', 'article_category_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name', ['article_statuses.id < ?' => '3']);
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->uniqueFields(['title']);
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackBeforeInsert(function ($s) {
            $s->data['user_id'] = Auth::id();
            return $s;
        });
        $crud->callbackAfterInsert(function ($s) {
            $data = Article::find($s->insertId);
            $data->slug = Str::slug($data->title);
            $data->created_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackAfterUpdate(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->slug = Str::slug($data->title);
            $data->updated_at = now();
            $data->save();

            return $s;
        });
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $crud->where([
            'articles.user_id' => Auth::id(),
            'articles.article_status_id < ?' => '3'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function article_published()
    {
        $title = "Published Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetDeleteMultiple()->unsetAdd()->unsetEdit()->setRead();
        $crud->columns(['title', 'article_status_id', 'article_category_id']);
        $crud->readFields(['title', 'content', 'thumbnail', 'article_status_id', 'article_category_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $crud->where([
            'articles.user_id' => Auth::id(),
            'articles.article_status_id = ?' => '3'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function article_rejected()
    {
        $title = "Rejected Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetDeleteMultiple()->unsetAdd()->unsetEdit()->setRead();
        $crud->columns(['title', 'article_status_id', 'article_category_id']);
        $crud->readFields(['title', 'content', 'thumbnail', 'article_status_id', 'article_category_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $crud->where([
            'articles.user_id' => Auth::id(),
            'articles.article_status_id = ?' => '4'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function article_deleted()
    {
        $title = "Deleted Articles";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('articles');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->unsetDeleteMultiple()->unsetDelete()->unsetAdd()->unsetEdit()->setRead();
        $crud->columns(['title', 'article_status_id', 'article_category_id']);
        $crud->readFields(['title', 'content', 'thumbnail', 'article_status_id', 'article_category_id']);
        $crud->setRelation('article_category_id', 'article_categories', 'name');
        $crud->setRelation('article_status_id', 'article_statuses', 'name');
        $crud->setRelation('user_id', 'users', 'name', ['role_id' => 2]);
        $crud->setTexteditor(['content']);
        $crud->setFieldUpload('thumbnail', 'storage', '../../storage');
        $crud->displayAs([
            'user_id' => 'User',
            'article_category_id' => 'Category',
            'article_status_id' => 'Status'
        ]);
        $crud->callbackDelete(function ($s) {
            $data = Article::find($s->primaryKeyValue);
            $data->article_status_id = 5;
            $data->save();

            return $s;
        });

        $crud->where([
            'articles.user_id' => Auth::id(),
            'articles.article_status_id = ?' => '5'
        ]);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }

    public function comment(Article $article, Request $request)
    {
        ArticleComment::create([
            'user_id' => Auth::id(),
            'article_id' => $article->id,
            'comment' => nl2br($request->comment)
        ]);

        return redirect()->back()->with('status', 'Komentar sudah berhasil. Akan muncul setelah dimoderasi.');
    }

    public function comments()
    {
        $title = "Article Comments";
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('article_comments');
        $crud->setSubject('Article', 'Articles');
        $crud->setSkin('bootstrap-v4');
        $crud->setRelation('user_id', 'users', '{name} {last_name}');
        $crud->setRelation('article_id', 'articles', 'title');
        $crud->unsetColumns(['created_at']);
        $crud->displayAs([
            'user_id' => 'Member',
            'article_id' => 'Article'
        ]);
        $crud->fieldType('is_approved', 'checkbox_boolean');
        $crud->editFields(['comment', 'is_approved']);

        $output = $crud->render();

        return $this->_show_output($output, $title);
    }
}
