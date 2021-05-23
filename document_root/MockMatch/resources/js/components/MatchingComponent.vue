<template>
    <div id="index-root">
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>MockMatch</v-card-title>
            <v-card-text>
                ようこそ {{ user['name'] }} さん
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
        <v-card max-width="800" class="mx-auto my-12">
            <v-card-title>Matching Reserve</v-card-title>
            <v-card-text>
                <v-form>
                    <input :value="csrf" type="hidden" name="_token"/>

                    <v-menu
                        ref="dateMenu"
                        v-model="dateMenu"
                        :close-on-content-click="false"
                        :return-value.sync="date"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="date"
                                label="日付"
                                prepend-icon="mdi-calendar"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            ></v-text-field>
                        </template>
                        <v-date-picker
                            v-model="date"
                            no-title
                            scrollable
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                text
                                color="primary"
                                @click="dateMenu = false"
                            >
                                Cancel
                            </v-btn>
                            <v-btn
                                text
                                color="primary"
                                @click="$refs.dateMenu.save(date)"
                            >
                                OK
                            </v-btn>
                        </v-date-picker>
                    </v-menu>
                    <v-row>
                        <v-col
                            cols="11"
                            sm="5"
                        >
                            <v-menu
                                ref="startTimeMenu"
                                v-model="startTimeMenu"
                                :close-on-content-click="false"
                                :nudge-right="40"
                                :return-value.sync="startTime"
                                transition="scale-transition"
                                offset-y
                                max-width="290px"
                                min-width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="startTime"
                                        label="希望開始時間"
                                        prepend-icon="mdi-clock-time-four-outline"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-time-picker
                                    v-if="startTimeMenu"
                                    v-model="startTime"
                                    full-width
                                    @click:minute="$refs.startTimeMenu.save(startTime)"
                                ></v-time-picker>
                            </v-menu>
                        </v-col>
                        <v-col
                            cols="11"
                            sm="5"
                        >
                            <v-menu
                                ref="endTimeMenu"
                                v-model="endTimeMenu"
                                :close-on-content-click="false"
                                :nudge-right="40"
                                :return-value.sync="endTime"
                                transition="scale-transition"
                                offset-y
                                max-width="290px"
                                min-width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="endTime"
                                        label="希望終了時間"
                                        prepend-icon="mdi-clock-time-four-outline"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                    ></v-text-field>
                                </template>
                                <v-time-picker
                                    v-if="endTimeMenu"
                                    v-model="endTime"
                                    full-width
                                    @click:minute="$refs.endTimeMenu.save(endTime)"
                                ></v-time-picker>
                            </v-menu>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>

            <div class="text-center">
                <v-btn
                    x-large
                    color="success"
                    dark
                    class="mx-5 my-7"
                >
                    Reserve
                </v-btn>
            </div>
        </v-card>

    </div>
</template>

<script>
export default {
    data: () => ({
        csrf: document.head.querySelector('meta[name="csrf-token"]').content,
        date: new Date().toISOString().substr(0, 10),
        dateMenu: false,
        startTime: null,
        endTime: null,
        startTimeMenu: false,
        endTimeMenu: false,
    }),
    props: {
        user: {
            type: Object,
            required: true
        },
        logout_url: {
            type: String,
            required: true
        },
        reserve_url: {
            type: String,
            required: true,
        }
    }
}
</script>
