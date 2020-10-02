<?php

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class UserPresentar extends Presenter
{
    public function link()
    {
        return new HtmlString( "<a href='" .
            route('roles.show', $this->model->id ?? '') .
            "'>{$this->model->name}</a>");
    }

    public function notes(){
        return $this->model->note ? $this->model->note->first(): '';
    }

    public function tags()
    {
        return $this->model->tags->first()->pluck('texto')->implode(', ');
    }
}
