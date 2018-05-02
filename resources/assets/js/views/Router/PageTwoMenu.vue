<template>
    
        <div>
            <p>Choose a Sub Page</p>
            <hr>
            <ul class="list-group">
                <router-link
                        tag="li"
                        to="/page-two/a"
                        class="list-group-item"
                        style="cursor: pointer">Page Two A
                </router-link>
                <router-link
                        tag="li"
                        to="/page-two/b?status=awesome"
                        class="list-group-item"
                        style="cursor: pointer">Page Two B
                </router-link>
            </ul>
        </div>
    
</template>

<script>
    export default {
        name: ""
    }
</script>

<style scoped>

</style>