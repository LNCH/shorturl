<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_BROKEN = 'broken';

    const STATUSES = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
        self::STATUS_BROKEN => 'Broken',
    ];

    const TYPE_SIMPLE = 'code';
    const TYPE_FRIENDLY = 'friendly';

    const TYPES = [
        self::TYPE_SIMPLE => 'Simple Code',
        self::TYPE_FRIENDLY => 'Friendly URL',
    ];

    public function getShortUrlAttribute()
    {
        return route('redirect', ['code' => $this->unique_key]);
    }

    public function checkStatus()
    {
        $url = $this->destination_url;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $statusCode ?? false;
    }
}
