<template>

    <li class="nav-item dropdown text-white"  style="color: white;">
        <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;" >
            <span class="glyphicon glyphicon-globe text-white" style="color: white;"></span>
                Notification 
            <span class="badge badge-warning">{{unreadNotifications.length}}</span>
        </a>

        <ul class="dropdown-menu" role="menu" style=" padding-right: 10px;">
            <li v-if="unreadNotifications.length == 0">
                <a href="#">No Notifications</a>
            </li>
            <li v-else @click="markNotificationAsRead">
                <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
            </li>
        </ul>
    </li>

</template>

<script type="application/javascript">
    import NotificationItem from './NotificationItem.vue';
    export default {
        props: ['unreads', 'userid'],
        components: {NotificationItem},
        data(){
            return {
                unreadNotifications: this.unreads
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/markAsRead');
                }
            }
        },
         mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification);
                    let newUnreadNotifications = {data: {thread: notification.thread, user: notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
