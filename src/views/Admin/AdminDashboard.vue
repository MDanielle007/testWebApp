<template>
    <v-layout class="h-100">
        <AdminAppbar/>
    
        <Sidebar/>
    
        <v-main>
            <h1>Admin Dashboard</h1>
        </v-main>
    </v-layout>
</template>

<script>
import { defineComponent } from 'vue';

// Components
import Sidebar from '@/components/Sidebar.vue'
import AdminAppbar from '@/components/AdminAppbar.vue';

export default defineComponent({
    name: 'AdminDashboard',
    components: {
        AdminAppbar,
        Sidebar
    },
});
</script>
