<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    /**
     * Get path for media
     */
    public function getPath(Media $media): string
    {
        return md5($media->id).'/';
    }

    /**
     * Get path for conversions
     */
    public function getPathForConversions(Media $media): string
    {
        return md5($media->id).'/conversions/';
    }

    /**
     * Get path for responsive images
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return md5($media->id).'/responsive-images/';
    }
}
