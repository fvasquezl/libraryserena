<?php
namespace App\Presenters;

use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

class PostPresenter extends Presenter
{

    public function postTitle()
    {
        return new HtmlString(" <a class='text-decoration-none text-muted' href='" . route('admin.posts.show', $this->model->id) . "'>
         {$this->model->id}. {$this->model->title}</a>
        ");
    }

    public function publishedAt()
    {
        $date = optional($this->model->published_at)->format('M d Y');
        return new HtmlString("{$date}");
    }


    public function tags()
    {
        $categories = $this->model->tags
                        ->pluck('name')
                        ->map(function ($value) {
                            return "<a href='".route('tags.show',$value)."'> #$value</a>";
                        })->implode(', ');

        return new HtmlString("{$categories}");
    }

    public function category()
    {
        if(!$this->model->category){
            return new HtmlString("<button class='btn btn-secondary'>Sin Categoria</button>");
        }
        return new HtmlString("<button class='btn btn-success'>{$this->model->category->name}</button>");
    }

    public function owner()
    {
        return new HtmlString("{$this->model->user->name}");
    }

    public function departments()
    {
        $roles= $this->model->roles->pluck('name');
        $departments = $this->model->departments->pluck('name');
        if(count($departments)&&count($roles)){
            return  $departments->implode(', ').'-'. $roles->implode(', ');
        }
        if(!count($departments) && count($roles)){
            return  $roles->implode(', ');
        }
        if(count($departments) && !count($roles)){
            return  $departments->implode(', ');
        }
        if(!count($departments) && !count($roles)){
            return 'Public';
        }
    }


    public function categories()
    {
        return $this->model->category ? $this->model->category->name : new HtmlString("<p style='color:red'>Sin Categoria</p>");
    }

    public function excerpt()
    {
        return new HtmlString(Str::limit(ltrim(strip_tags($this->model->excerpt)),30));
    }

}
