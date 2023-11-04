<template>
    <v-layout class="h-100">
        <AdminAppbar/>
    
        <Sidebar/>
    
        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
            
        </v-main>
    </v-layout>
</template>

<script>
import { defineComponent } from 'vue';

// Components
import Sidebar from '@/components/Sidebar.vue'
import AdminAppbar from '@/components/AdminAppbar.vue';

export default defineComponent({
    name: 'AdminNotifications',
    components: {
        AdminAppbar,
        Sidebar
    },
});
</script>
