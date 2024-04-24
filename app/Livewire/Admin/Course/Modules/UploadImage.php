<?php

namespace App\Livewire\Admin\Course\Modules;

use App\Models\Admin\Course\Module;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadImage extends Component
{
    use WithFileUploads;

    public $uploadimage;
    public $module;
    public $id;
    public $photo;
    public $rules;
    public $code;
    public $valid = false;

    public function mount($id)
    {
        if ($id) {
            $this->id = $id;
            $this->module = Module::find($id);
            $this->code = $this->module->code;

            if (Storage::exists('modules/' . $this->module->id.'/thumb')) {
                $this->photo = true;
            } else {
                $this->photo = false;
            }
        }
    }
    public function render()
    {
        return view('livewire.admin.courses.modules.upload-image');
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
                $new_name = $this->module->code . '.jpg';
                $this->module->image_path = $this->module->code;
                $this->module->save();
                $this->uploadimage->storeAs('livewire-tmp', $new_name);
                $this->valid = true;
                $this->reSize($new_name,$this->module->id);
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
        Storage::deleteDirectory('modules/' . $this->module->id.'/thumb');
        $this->module->image_path = '';
        $this->openAlert('success', 'Imagem excluida com sucesso.');
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
    /**Thumb */
    public function reSize($image,$module)
    {
        Storage::makeDirectory('modules/' . $this->module->id.'/thumb');

        // dd('storage/public/livewire-tmp/' . $image);
        $img = explode('.', $image);
        $logoWebp = Image::make('storage/livewire-tmp/' . $image);
        $logoWebp->encode('webp', 80);
        $logoWebp->save('storage/modules/'.$module.'/thumb/' . $img[0] . '.webp');

        $logoPng = Image::make('storage/livewire-tmp/' . $image);
        $logoPng->encode('png', 80);
        $logoPng->save('storage/modules/'.$module.'/thumb/' . $img[0] . '.jpg');
    }

}
