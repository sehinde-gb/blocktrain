<template>
    <section class="content">
        <form class="form-inline">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="onestar" value="1" v-model="userRating">
                <label class="form-check-label" for="onestar">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="twostars" value="2" v-model="userRating">
                <label class="form-check-label" for="twostars">2</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="threestars" value="3" v-model="userRating">
                <label class="form-check-label" for="threestars">3</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="fourstars" value="4" v-model="userRating">
                <label class="form-check-label" for="fourstars">4</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="fivestars" value="5" v-model="userRating">
                <label class="form-check-label" for="fivestars">5</label>
            </div>
        </form>
        <button type="button" class="btn btn-dark" style="margin-top: 1rem;" @click="clearRating">Clear Rating</button>
    </section>
</template>

<script>
export default {
        data() {
            return {
                userRating: null
            }
        },
        props: {
            selectedUserRating: {
                type: Number,
                    required: false
            }
        },
        mounted() {
            this.userRating = this.selectedUserRating
        },
        methods: {
            clearRating() {
                this.userRating = null
            }
        },
        watch: {
            userRating: function(newRating, oldRating) {
                // do some async writing to the database, then if successful, emit the update event
                let success = true
    
                if (success) {
                    this.$emit('ratingUpdated', newRating)
                }
            },
            selectedUserRating: function(newRating, oldRating) {
                this.userRating = newRating
            }
        }
    }
</script>

<style scoped>
    #app {
        max-width: 800px;
        margin: auto;
        padding: 2rem;
    }
    
    .mainBody {
        height: 500px;
        padding-top:50px;
    }
    
    .content {
        padding-top: 40px;
    }
    
    .list-group-item:hover {
        cursor: pointer;
    }
</style>