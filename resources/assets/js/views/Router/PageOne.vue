<template>
    <div>
        <h1>Hi!
            <small class="text-muted">I am page 1!</small>
        </h1>
        <p>I have a dynamic id value of {{id}}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: this.$route.params.id
            }
        }
    }
</script>