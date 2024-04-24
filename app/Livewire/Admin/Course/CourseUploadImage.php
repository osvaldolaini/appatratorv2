<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CourseUploadImage extends Component
{
    use WithFileUploads;

    public $uploadimage;
    public $course;
    public $id;
    public $photo;
    public $rules;
    public $code;
    public $valid = false;

    public function mount(Course $course)
    {
        $this->course = $course;

    }
    public function render()
    {
        if ($this->course->image) {
            $this->photo = true;
        } else {
            $this->photo = false;
        }
        return view('livewire.admin.courses.upload-image');
    }
    public function changePhoto()
    {
        $this->dispatch('submitForm');
    }
    public function updated($property)
    // public function uploadPhoto()
    {
        if ($property === 'uploadimage') {
            $this->rules = [
                'uploadimage'   => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            ];

            $this->validate();
            if (isset($this->uploadimage)) {
                // $ext = $this->uploadimage->getClientOriginalExtension();
                $new_name = 'atrator-concursos-'.Str::uuid() . '.jpg';
                $this->course->image = 'atrator-concursos-'.Str::uuid();
                $this->course->save();
                $this->uploadimage->storeAs('public/livewire-tmp', $new_name);
                $this->valid = true;
                $this->reSize($new_name);
                $this->openAlert('success', 'Imagem validada com sucesso.');
            }
        }
    }
    public function excluirTemp()
    {
        $this->uploadimage = '';
    }

    public function excluirPhoto()
    {
        Storage::deleteDirectory('courses/' . $this->course->id);
        $this->course->image = '';
        $this->course->save();
        $this->openAlert('success', 'Imagem excluida com sucesso.');
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
    /**Thumb */
    public function reSize($image)
    {
        Storage::makeDirectory('courses/' . $this->course->id);

        $logoWebp = Image::make('livewire-tmp/' . $image);
        $logoWebp->encode('webp', 80);
        $logoWebp->save('courses/' . $this->course->id . '/'.$this->course->image.'.webp');

        $logoPng = Image::make('livewire-tmp/' . $image);
        $logoPng->encode('png', 80);
        $logoPng->save('courses/' . $this->course->id . '/'.$this->course->image.'.jpg');
    }
}
