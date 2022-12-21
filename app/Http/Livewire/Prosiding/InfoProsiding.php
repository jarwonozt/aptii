<?php

namespace App\Http\Livewire\Prosiding;

use App\Models\Post\PostArticles;
use Livewire\Component;
use RobertSeghedi\News\Models\Article;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class InfoProsiding extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = PostArticles::where('status', true)->orderByDesc('created_at')->paginate(12);
        return view('livewire.prosiding.info-prosiding', [
            'data' => $data
        ]);
    }
}
