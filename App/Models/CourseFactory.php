<?php
namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

// /app/models/CourseFactory.php

class CourseFactory
{
    public static function createCourse($type, $title, $description, $category_id, $enseignant_id, $content, $tags)
    {
        if ($type === 'video') {
            return new CoursVideo($title, $description, $category_id, $enseignant_id, $content, $type, $tags);
        } elseif ($type === 'text') {
            return new CoursText($title, $description, $content, $category_id, $enseignant_id, $type, $tags);
        }
        return null;
    }
}

