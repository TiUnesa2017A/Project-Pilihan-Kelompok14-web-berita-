<template>
    <div class="wrap">
        <a :href="threadUrl" style="width: 90px;">
            {{ unread.data.user.name }} commented on {{ unread.data.thread.title }}
        </a>
    </div>
</template>

<script type="application/javascript">
    export default {
        props:['unread'],
        data(){
            return {
                threadUrl:""
            }
        },
        mounted(){
            this.threadUrl="thread/"+ this.unread.data.thread.id
        }
    }
</script>