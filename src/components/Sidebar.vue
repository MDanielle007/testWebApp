<template>
    <v-navigation-drawer
        v-model="drawer"
        :rail="rail"
        permanent
        @click="rail = false"
    >
        <v-list-item
            class="ml-2"
            prepend-icon="mdi-account-circle"
            title="Current User"
            nav
        >
            <template v-slot:append>
                <v-btn
                variant="text"
                icon="mdi-chevron-left"
                @click.stop="rail = !rail"
                ></v-btn>
            </template>
        </v-list-item>

        <v-divider></v-divider>

        <v-list density="compact" nav>
            <v-list-item prepend-icon="mdi-monitor-dashboard" title="Dashboard" value="dashboard" to="/admin"></v-list-item>
            <v-list-item prepend-icon="mdi-barn" title="Livestock Management" value="livestock-management" to="/admin/livestock-management"></v-list-item>
            <v-list-item prepend-icon="mdi-file-chart" title="Reporting and Analytics" value="reporting-analytics" to="/admin/report-analysis"></v-list-item>
            <v-list-item prepend-icon="mdi-message-bulleted" title="Notifications" value="notifications" to="/admin/notifications"></v-list-item>
            <v-list-item prepend-icon="mdi-view-list-outline" title="Audit Trail" value="audit-trail" to="/admin/audit-trail"></v-list-item>
            <v-list-item prepend-icon="mdi-account-group-outline" title="User Management" value="users" to="/admin/user-accounts"></v-list-item>
        </v-list>
        <template v-slot:append>
            <v-list nav>
                <v-list-item prepend-icon="mdi-cog" title="Settings" value="settings"></v-list-item>
            </v-list>
            <div class="pa-2">
                <v-btn block>
                Logout
                </v-btn>
            </div>
        </template>
    </v-navigation-drawer>
</template>
<script>
export default {
    data () {
        return {
            drawer: true,
            rail: false,
        }
    },
}
</script>