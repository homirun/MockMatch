<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>MockMatch</v-card-title>
            <v-card-text>
                Reserved
            </v-card-text>
            <div class="text-center">
                <v-btn
                    x-large
                    color="error"
                    dark
                    class="mx-5 my-7"
                    :href="logout_url"
                >
                    Logout
                </v-btn>
            </div>
        </v-card>

    </div>
</template>

<script>
export default {

    props: {
        logout_url: {
            type: String,
            required: true
        },
    },
    methods: {
        dataSend: function () {
            let params = new URLSearchParams()
            params.append('_csrf', this.csrf)
            params.append('reserve_date', this.date)
            params.append('start_time', this.startTime)
            params.append('end_time', this.endTime)

            axios.post(this.reserve_url, params)
                .then(function (response) {
                    window.location.href = response['data']['redirect_url']
                }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
