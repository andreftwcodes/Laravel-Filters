<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" :class="{ 'disabled': meta.current_page === 1 }">
                <a class="page-link" href="#" aria-label="Previous" @click.prevent="switched(meta.current_page - 1)">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item" :class="{ 'active' : meta.current_page === x }" v-for="x in meta.last_page" :key="x">
                <a class="page-link" href="#" @click.prevent="switched(x)">{{ x }}</a>
                </li>
            <li class="page-item" :class="{ 'disabled': meta.current_page === meta.last_page }">
                <a class="page-link" href="#" aria-label="Next" @click.prevent="switched(meta.current_page + 1)">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: [
            'meta'
        ],
        methods: {
            switched (page) {
                if (this.pageIsOutOfBounds()) {
                    return;
                }
                this.$emit('pagination:switched', page)

                this.$router.replace({
                    query: Object.assign({}, this.$route.query, { page })
                })
            },
            pageIsOutOfBounds (page) { //no need in boostrap 4
                return page <= 0 || page > this.meta.last_page
            }
        }
    }
</script>
