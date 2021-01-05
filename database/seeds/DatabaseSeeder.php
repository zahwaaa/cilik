<?php

use App\Status;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Article\Entities\ArticleCategory;
use Modules\Article\Entities\ArticleStatus;
use Modules\User\Entities\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Status::create(['name' => 'Aktif']);
        Status::create(['name' => 'Tidak Aktif']);

        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'Member'
        ]);

        User::create([
            'name' => 'Admin',
            'last_name' => 'Sistem',
            'role_id' => 1,
            'email' => 'admin@cilik.id',
            'password' => Hash::make('password')
        ]);

        ArticleStatus::create([
            'name' => 'Draft'
        ]);
        ArticleStatus::create([
            'name' => 'Submit for Review'
        ]);
        ArticleStatus::create([
            'name' => 'Published'
        ]);
        ArticleStatus::create([
            'name' => 'Rejected'
        ]);
        ArticleStatus::create([
            'name' => 'Deleted'
        ]);

        $arr = ['Berita Anak', 'Cerita Anak', 'Cerita Bersambung', 'Cerita Misteri', 'Dongeng Anak', 'Gambar Anak', 'Ide Kreatif Anak', 'Parenting Indonesia', 'Pelajaran Sekolah', 'Puisi Anak', 'Tugas Sekolah'];
        foreach($arr as $ar){
            ArticleCategory::create([
                'name' => $ar,
                'slug' => Str::slug($ar)
            ]);
        }
    }
}
