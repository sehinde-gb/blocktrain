<template>
    <div>
        <h1>Hello!
            <small class="text-muted">I am page 2!</small>
        </h1>
        <p>An example of using this.$router.push()</p>
        <button @click="pushHome" class="btn">Go Home</button>
        <p>Status = {{$route.query.status}}</p>
        <hr>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        methods: {
            pushHome() {
                this.$router.push('/');
            }
        }
    }
</script>