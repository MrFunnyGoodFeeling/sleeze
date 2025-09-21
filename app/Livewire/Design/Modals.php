<?php

namespace App\Livewire\Design;

use Livewire\Component;
use Livewire\WithFileUploads;

class Modals extends Component
{

    use WithFileUploads;

    public $modalCreate = false;
    public $title = "";
    public $body = "";
    public $photos = [];
    public $public = true;

    public $modalDelete = false;

    public $alertInfo = "";
    public $alertSuccess = "";
    public $alertWarning = "";
    public $alertDanger = "";

    public function toggleModalCreate(){
        $this->modalCreate = !$this->modalCreate;
    }

    public function save()
    {
        $this->reset(['alertInfo', 'alertSuccess', 'alertWarning', 'alertDanger']);

        $this->body = trim($this->body);
        $this->body = preg_replace("/[\r\n]{3,}/", "\n\n", $this->body);

        $this->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string|max:255',
            'photos.*' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
        ], [
            'title.required' => 'This field is required.',
            'title.max' => 'Max 255 characters.',
            'body.max' => 'Max 255 characters.',
            'photos.*.image' => 'Invalid file type.',
            'photos.*.mimes' => 'Invalid MIME type. Accepted: jpeg, jpg, png, webp.',
            'photos.*.max' => 'One or more images exceeds 1MB.',
        ]);

        // save

        $this->reset(['title', 'body', 'photos', 'public']);
        $this->alertSuccess = "Post created.";
        $this->toggleModalCreate();
    }

    public function toggleModalDelete(){
        $this->modalDelete = !$this->modalDelete;
    }

    public function delete()
    {
        $this->reset(['alertInfo', 'alertSuccess', 'alertWarning', 'alertDanger']);

        $this->alertInfo = "Post deleted.";

        $this->toggleModalDelete();
    }

    public function render(){
        return view('livewire.design.modals');
    }

}
