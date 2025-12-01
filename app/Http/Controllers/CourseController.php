<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseContent;
use App\Models\CourseCertificate;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // 1. Courses
        $courses = Course::orderBy('created_at', 'desc')->get();

        // 2. Content for tabs
        $contents = CourseContent::all()->keyBy('key');

        // 3. Certificates
        $certificates = CourseCertificate::orderBy('created_at', 'desc')->get();

        return view('academy.courses.index', compact('courses', 'contents', 'certificates'));
    }

    public function show($locale, Course $course)
    {
        return view('academy.courses.show', compact('course'));
    }
}