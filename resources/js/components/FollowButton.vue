<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId','follows'],

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/'+this.userId)
                    .then(response => {
                        this.status=!this.status;
                        console.log(response.data);
                        if (this.status===true){
                            axios.post('/email/followed/'+this.userId);
                        }
                    })
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>

<style scoped>

</style>