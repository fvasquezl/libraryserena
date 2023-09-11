<?php
namespace Database\Seeders;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        //1
        $post = new Post;
        $post->title = $title = 'Publicacion Prueba';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Actualizacion del sistema a laravel 8';
        $post->user_id = 1;
        // $post->category_id = 1;
        $post->published_at = Carbon::now()->subDays(10)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([7]);
        // $post->tags()->sync([1, 2]);
        $post->assignRole(4);
    }

}
