<?php

namespace App\Models\Admin\Marketing;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SocialMedias extends Model
{
    use HasFactory;

    protected $table = 'social_medias';

    protected $fillable = [
        'id', 'active', 'slug', 'title', 'media', 'link', 'updated_by', 'created_by', 'created_at'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d/m/Y H:i:s');
    }

    public function getUpdatedAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)
            ->format('d/m/Y H:i:s');
    }

    public function getMediaAttribute($value)
    {
        switch ($value) {
            case 'facebook':
                return 'Facebook';
                break;
            case 'instagram':
                return 'Instagram';
                break;
            case 'twitter':
                return 'Twitter';
                break;
            case 'youtube':
                return 'Youtube';
                break;
            case 'tiktok':
                return 'Tik Tok';
                break;
            case 'linkdin':
                return 'LinkdIn';
                break;

            default:
                return '';
                break;
        }
    }
    public function getConvertMediaAttribute()
    {
        switch ($this->media) {
            case 'Facebook':
                return 'facebook';
                break;
            case 'Instagram':
                return 'instagram';
                break;
            case 'Twitter':
                return 'twitter';
                break;
            case 'Youtube':
                return 'youtube';
                break;
            case 'Tik Tok':
                return 'tiktok';
                break;
            case 'LinkdIn':
                return 'linkdin';
                break;

            default:
                return '';
                break;
        }
    }
};
