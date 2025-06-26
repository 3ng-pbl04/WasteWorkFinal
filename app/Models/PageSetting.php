<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $table = 'page_settings';

    protected $fillable = [
        // Logo Section
        'company_logo',
        'company_name',

        // Hero Section
        'hero_title',
        'hero_description',
        'hero_image',

        // About Section
        'about_title',
        'visi',
        'misi',
        'keunggulan',
        'about_image',

        // Footer Section
        'footer_text',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'youtube_link',
        'tiktok_link',
        'alamat',
    ];
}
