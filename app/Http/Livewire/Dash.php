<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annonce;
use App\Models\Information;
use App\Models\Publication;
use App\Models\User;


class Dash extends Component
{
    public $annonces;
    public $informations;



public function mount()
{
    $this->annonces = Annonce::with('publication')->get();
    $this->informations = Information::with('publication')->get();

    $userIds = $this->annonces->pluck('publication.user_id')->merge($this->informations->pluck('publication.user_id'))->unique();
    $users = User::whereIn('id', $userIds)->get()->keyBy('id');

    $this->annonces->each(function ($annonce) use ($users) {
        $annonce->user = $users->get($annonce->publication->user_id);
    });

    $this->informations->each(function ($information) use ($users) {
        $information->user = $users->get($information->publication->user_id);
    });
}



    public function render()
    {
        return view('livewire.dash', [
            'annonces' => $this->annonces,
            'informations'=> $this->informations
        ]);
    }
}
