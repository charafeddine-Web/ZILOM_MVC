<?php

namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

class CoursTags
{
    private $courseId;
    private $tags;

    public function __construct($courseId, $tags)
    {
        $this->courseId = $courseId;
        $this->tags = $tags;
    }
}