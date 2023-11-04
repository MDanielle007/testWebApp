import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminDashboard from '../views/Admin/AdminDashboard.vue'
import AdminLivestockManagement from '../views/Admin/AdminLivestockManagement.vue'
import ReportAnalysis from '../views/Admin/AdminReportAnalyis.vue'
import AdminNotifications from '../views/Admin/AdminNotifications.vue'
import AuditTrail from '../views/Admin/AdminAuditTrail.vue'
import AdminUserAccounts from '../views/Admin/AdminUserAccounts.vue'
import AdminSettings from '../views/Admin/AdminSettings.vue'
import AdminRegisterAccount from '../views/Admin/AdminRegisterAccount.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/admin',
    name: 'admin',
    component: AdminDashboard
  },
  {
    path: '/admin/livestock-management',
    name: 'admin-livestock-management',
    component: AdminLivestockManagement
  },
  {
    path: '/admin/report-analysis',
    name: 'admin-report-analysis',
    component: ReportAnalysis
  },
  {
    path: '/admin/notifications',
    name: 'admin-notifications',
    component: AdminNotifications
  },
  {
    path: '/admin/audit-trail',
    name: 'admin-audit-trail',
    component: AuditTrail
  },
  {
    path: '/admin/user-accounts',
    name: 'admin-user-accounts',
    component: AdminUserAccounts
  },
  {
    path: '/admin/settings',
    name: 'admin-settings',
    component: AdminSettings
  },
  {
    path: '/admin/register-account',
    name: 'register-account',
    component: AdminRegisterAccount
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
