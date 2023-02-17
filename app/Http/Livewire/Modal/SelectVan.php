<?php

namespace App\Http\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\URL;

class SelectVan extends ModalComponent
{

    public $vans;
    public $type;
    public $query;
    // public $images;

    public function mount($van)
    {
        // get url query string param
        $parsedUrl = parse_url(URL::previous());
        parse_str($parsedUrl['query'], $this->query);

        $this->vans = $van;
        $this->type = 'rent';
        // $this->images = explode('|', $this->van['vanImages']);
    }

    public function render()
    {
        return view('livewire.modal.select-van');
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
