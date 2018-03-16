<template>
    <div id="show">
        <h2>All Journeys</h2>
        <div v-for="blog in blogs">
            <h2>{{ blog.title }}</h2>
            <article>{{ blog.body }}</article>
        </div>
    </div><!-- /#show -->
</template>

<script>
    export default {
        data() {
            return {
                blogs: [],
               
            }
        },
        mounted () {
           this.created();
        },
        methods: {
            created() {
                axios.get('https://jsonplaceholder.typicode.com/posts').then(result => {
                    this.blogs = result.data
                });
                
        }   }
    }
</script>

<style scoped>

</style>