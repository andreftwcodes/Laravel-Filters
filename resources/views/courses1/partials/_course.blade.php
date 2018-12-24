<div class="media">
    <a href="#"><img class="mr-3" src="https://via.placeholder.com/64x64" alt="{{ $course->name }}"></a>
    <div class="media-body">
        @if ($course->subjects->count())
            <ul class="list-inline">
                @foreach ($course->subjects as $subject)
                    <li class="list-inline-item">{{ $subject->name }}</li>
                @endforeach
            </ul>
        @endif
        <h4 class="mt-0">{{ $course->name }}</h4>
        <ul class="list-inline">
            <li class="list-inline-item">{{ $course->FormattedAccess }}</li>
            <li class="list-inline-item">{{ $course->FormattedDifficulty }}</li>
            <li class="list-inline-item">{{ $course->FormattedType }}</li>
            <li class="list-inline-item">{{ $course->FormattedStarted }}</li>
        </ul>
    </div>
</div>