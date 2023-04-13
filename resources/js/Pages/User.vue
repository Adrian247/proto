<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {VDataTable} from "vuetify/labs/components";
defineProps({
    users: Object,
});
</script>
<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-grey">Users</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <v-card>
                            <v-row>
                                <v-col cols="11" sm="11">
                                    <v-card-title class="text-h6 text-md-h5 text-lg-h4">
                                        <v-text-field
                                            v-model="search"
                                            append-icon="mdi-magnify"
                                            label="Search user"
                                            single-line
                                            hide-details
                                            variant="underlined"
                                            theme="dark"
                                        ></v-text-field>
                                    </v-card-title>
                                </v-col>
                            </v-row>
                            <v-data-table
                                :headers="headers"
                                :items="users"
                                :sort-by="[{ key: 'email', order: 'asc' }]"
                                :search="search"
                                fixed-header
                            >
                            </v-data-table>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import {userToHost} from "@/Src/Mappers/UserMapper";
import {VDataTable} from "vuetify/labs/components";

export default {
    created() {
        this.mapToHost()
    },
    components: {
        VDataTable,
    },
    data: () => ({
        search: '',
        dialog: false,
        dialogDelete: false,
        headers: [
            {
                title: 'Name',
                align: 'start',
                key: 'name',
            },
            { title: 'Email', key: 'email' },
            { title: 'Created at', key: 'created_at' },
        ],
    }),
    computed: {},
    methods: {
        mapToHost() {
            this.users.map((user,index) => {
                this.users[index] = userToHost(user);
            })
        }
    },
}
</script>

<style scoped>
</style>
