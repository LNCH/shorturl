<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    protected $fillable = [
        'name',
        'type',
        'status',
        'destination_url',
        'description',
        'unique_key',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Returns the Short URL for this link.
     *
     * @return string
     */
    public function getShortUrlAttribute()
    {
        return route('redirect', ['code' => $this->unique_key]);
    }

    public function getQrCodeAttribute()
    {
        return QrCode::size(1024)
            ->style('dot', 0.9)
            ->gradient(245, 66, 230, 0, 0, 0, 'radial')
            ->generate($this->shortUrl);
    }

    public function getQrCodeImageAttribute()
    {
        return QrCode::size(1024)
            ->format('png')
            ->style('dot', 0.9)
            ->gradient(245, 66, 230, 0, 0, 0, 'radial')
            ->generate($this->shortUrl);
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

    public function getLiveStatusAttribute()
    {
        $status = $this->checkStatus();

        if (Str::startsWith($status, 2)) {
            return self::STATUS_ACTIVE;
        }

        return self::STATUS_BROKEN;
    }
}
