<?php

namespace App\Models\Apps\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MyContent extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'module_contents';

    public function module()
    {
        return $this->belongsTo(MyModule::class, 'module_id', 'id');
    }
    public function check()
    {
        $check = MyContent::where('id', $this->id)->where('type', 1)->first();
        if ($check) {
            $t = MyContentCheck::where('content_id', $check->id)->where('user_id', Auth::user()->id)->first();
            if (isset($t)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function getImageAttribute()
    {
        if (Storage::exists('public/modules/' . $this->module_id.'/content/'.$this->id.'/thumb/'. $this->code . '.webp')) {
            return true;
        } else {
            return false;
        }
    }
    public function getDocumentsAttribute()
    {
        if (Storage::exists('public/modules/' . $this->module_id . '/content/' . $this->id . '/uploads')) {
            // Obtenha todos os arquivos na pasta
            if (count(Storage::allFiles('public/modules/' . $this->module_id . '/content/' . $this->id . '/uploads')) > 0) {
                $documents = Storage::files('public/modules/' . $this->module_id . '/content/' . $this->id . '/uploads');
                foreach ($documents as $value) {
                    $val = explode('/', $value);
                    $names = explode('.', $val[6]);
                    $reversed = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $names[0]);

                    // Capitalizar as palavras
                    $reversed = ucwords($reversed);
                    $docs[] = [
                        'name' => $reversed,
                        'ext' => $names[1],
                        'path' => $value,
                        'content' => $this->id,
                    ];
                }
               return json_encode($docs);
            }else{
                return false;
            }

        } else {
            return false;
        }
    }
}
