<template>
    <v-layout class="h-100">
        <AdminAppbar/>
    
        <Sidebar/>

        <v-main>
            <v-container class="d-flex justify-center flex-column">
                <v-container class="d-flex justify-end">
                    <v-btn prepend-icon="mdi-plus" class="bg-blue" to="/admin/register-account">
                    Button
                </v-btn>
                </v-container>
                <UserAccountsTable/>
            </v-container>
        </v-main>
    </v-layout>
</template>
<script>
import { defineComponent } from 'vue';
import Sidebar from '@/components/Sidebar.vue'
import AdminAppbar from '@/components/AdminAppbar.vue';
import UserAccountsTable from '@/components/tables/UserAccountsTable.vue'

export default defineComponent({
    name: 'AdminRegisterAccount',
    components:{
        AdminAppbar,
        Sidebar,
        UserAccountsTable
    }
})
</script>
<style>
    
</style>