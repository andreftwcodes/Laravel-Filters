<?php

namespace App\Filters\Course;

use App\Filters\FiltersAbstract;
use App\Filters\Course\{AccessFilter, DifficultyFilter, TypeFilter, SubjectFilter, StartedFilter};
use App\Filters\Course\Ordering\ViewsOrder;

use App\Subject;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CourseFilters extends FiltersAbstract
{
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'type' => TypeFilter::class,
        'subject' => SubjectFilter::class,
        'started' => StartedFilter::class,
        'order' => ViewsOrder::class,
    ];

    public static function mappings()
    {
        $map = [
            'access' => [
                'free' => 'Free', 
                'premium' => 'Premium'
            ],
            'difficulty' => [
                'beginner' => 'Beginner', 
                'intermediate' => 'Intermediate', 
                'advanced' => 'Advanced'
            ],
            'type' => [
                'snippet' => 'Snippet', 
                'project' => 'Project', 
                'theory' => 'Theory'
            ],
            'subject' => Subject::get()->pluck('name', 'slug'), 
        ];

        if (auth()->check()) {
            $map = array_merge($map, ['started' => [
                'true' => 'Started', 
                'false' => 'Not started'
            ]]);
        }

        return $map;
    }

    public static function canClearAllFilters()
    {
        return count(array_intersect(array_keys(request()->query()), array_keys(self::mappings())));
    }
}

