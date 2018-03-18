<template>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="lead-form">
                        <h1 class="text-center">Fill Out This Form</h1>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="From:">
                                <span class="from-span">Canons Park</span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="To:">
                                <span class="to-span"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" id="submit-form">Submit</button>
                            </div>
                        </div>
                    </div><!-- end of .lead-form -->
                </div> <!-- end of .col-md-6.col-md-offset-3 -->
            </div> <!-- end of .row -->
        </div> <!-- end of .container -->
    </div> <!-- end of #app -->
</template>

<script>

    export default {
        name: ""
    }
</script>

<style scoped>

</style>