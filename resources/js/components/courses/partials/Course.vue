<template>
    <div class="media">
        <a href="#"><img class="mr-3" src="https://via.placeholder.com/64x64" :alt="course.name"></a>
        <div class="media-body">
            <ul class="list-inline" v-if="course.subjects.length">
                <li class="list-inline-item" v-for="subject in course.subjects" :key="subject.id">{{ subject.name }}</li>
            </ul>
            <h4 class="mt-0">{{ course.name }}</h4>
            <ul class="list-inline">
                <li class="list-inline-item">{{ course.formattedAccess }}</li>
                <li class="list-inline-item">{{ course.formattedDifficulty }}</li>
                <li class="list-inline-item">{{ course.formattedType }}</li>
                <li class="list-inline-item">{{ course.formattedStarted }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'course'
        ]
    }
</script>
