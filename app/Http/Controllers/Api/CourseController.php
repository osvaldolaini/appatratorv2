<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Course\CategoryCourse;
use App\Http\Controllers\Controller;
use App\Models\Admin\Course\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function highlighted()
    {
        $courses = Course::select('id','title','slug','meta_description','price_id','image')->with('categories')
        ->where('highlighted',1)
        ->where('active',1)
        ->inRandomOrder()
        ->limit(4)
        ->get();

        $allCategories = CategoryCourse::select('title','acronym','id','master')
        ->where('active',1)
        ->get();

        $apiCourse= array();
        foreach ($courses as $course) {
            $category = '';
            if ($course->categories) {
                foreach ($course->categories as $key) {
                    $category .= ' filter-'.$key->category->master;
                }
            }

            $apiCourse[]=array(
                'src'           => url('storage/courses/' . $course->id . '/'.$course->image.'.webp'),
                'alt'           => $course->slug,
                'cat'           => $category,
                'description'   => $course->meta_description,
                'slug'          => 'https://atratorconcursos.com.br/nossos-cursos/'.$course->slug,
                'title'         => $course->title,
            );
        }
        if(isset($apiCourse)){
            shuffle($apiCourse);
            return response()->json(
                [
                    'success'=> true,
                    'data'   => $apiCourse,
                    'allCat' => $allCategories,
                    'more'   => 'https://atratorconcursos.com.br/nossos-cursos',
                ]
            );
        }else{
            return response()->json(
                [
                    'success'=> false,
                    'error'=> false,
                ]
            );
        }
    }
    public function index()
    {
        $courses = Course::select('id','title','slug','meta_description','price_id','image')->with('categories')
        ->where('highlighted',1)
        ->where('active',1)
        ->inRandomOrder()
        ->get();

        $allCategories = CategoryCourse::select('title','acronym','id','master')
        ->where('active',1)
        ->get();

        $apiCourse= array();
        foreach ($courses as $course) {
            $category = '';
            if ($course->categories) {
                foreach ($course->categories as $key) {
                    $category .= ' filter-'.$key->category->master;
                }
            }

            $apiCourse[]=array(
                'src'           => url('storage/courses/' . $course->id . '/'.$course->image.'.webp'),
                'alt'           => $course->slug,
                'cat'           => $category,
                'description'   => $course->meta_description,
                'prices'        => $course->packs->where('active',1),
                'slug'          => 'https://atratorconcursos.com.br/nossos-cursos/'.$course->slug,
                'title'         => $course->title,
            );
        }
        if(isset($apiCourse)){
            shuffle($apiCourse);
            return response()->json(
                [
                    'success'=> true,
                    'data'   => $apiCourse,
                    'allCat' => $allCategories,
                    'more'   => 'https://atratorconcursos.com.br/nossos-cursos',
                ]
            );
        }else{
            return response()->json(
                [
                    'success'=> false,
                    'error'=> false,
                ]
            );
        }
    }
    public function course($slug)
    {
        $courses = Course::select('id','title','slug','large_description',
        'youtube_link','meta_description','price_id','image')
        ->where('slug',$slug)
        ->where('active',1)
        ->first();

        if(isset($courses)){
            return response()->json(
                [
                    'success'=> true,
                    'data'   => $courses,
                ]
            );
        }else{
            return response()->json(
                [
                    'success'=> false,
                    'error'=> false,
                ]
            );
        }
    }

}
