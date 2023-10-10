<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document as documentModel;

class Document extends Component
{
    use WithFileUploads;
    public $photo;
    public $valid_id;
    public $document;

    public function mount()
    {
        if (auth()->user()->student == null) {
            return redirect()->route('student.dashboard');
        }
    }
    public function render()
    {
        return view('livewire.student.document');
    }

    public function submitPhoto()
    {
        $data = documentModel::where('user_id', auth()->user()->id)->first();
        $data->update([
            'photo_path' => $this->photo->store('StudentPhoto', 'public'),
        ]);
        $this->reset('photo');
    }

    public function submitValidId()
    {
        $data = documentModel::where('user_id', auth()->user()->id)->first();
        $data->update([
            'valid_id_path' => $this->valid_id->store('StudentValidId', 'public'),
        ]);
        $this->reset('valid_id');
    }

    public function submitDocument()
    {
        $data = documentModel::where('user_id', auth()->user()->id)->first();
        $data->update([
            'document_path' => $this->document->store('StudentDocument', 'public'),
        ]);
        $this->reset('document');
    }
}