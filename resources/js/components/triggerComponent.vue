<template>
    <div>
        <!-- SP用ハンバーガーアイコン -->
        <div @click="triggerOn" :class="{'is-active':active}" class="p-trigger__icon">
            <span class="p-trigger__bar"></span>
            <span class="p-trigger__bar"></span>
            <span class="p-trigger__bar"></span>
        </div>
        <!-- SP用メニュー -->
        <transition name="drawer">
            <nav v-if="drawerFlg" class="p-trigger__menu">
                <!-- ログインしている場合 -->
                <ul class="p-trigger__list" v-if="this.user">
                    <li class="p-trigger__list-item">
                        <span class="u-fontsize-12">account</span><br>
                        <span>{{this.user['name']}}</span>さん
                    </li>
                    <li class="p-trigger__list-item"><a href="/todos">TODOリスト管理画面</a></li>
                    <li class="p-trigger__list-item">
                        <a href="/logout" id="logout" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </li>
                </ul>
                <!-- 未ログインの場合 -->
                <ul class="p-trigger__list" v-else>
                    <li class="p-trigger__list-item">
                        <span class="u-fontsize-12">account</span><br>
                        <span>ログインしていません</span>
                    </li>
                    <li class="p-trigger__list-item"><a href="/login">ログイン</a></li>
                    <li class="p-trigger__list-item"><a href="/register">新規登録</a></li>
                </ul>
            </nav>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: [],//ユーザー情報
                active: false,//ハンバーガーアイコンのis-active=falseにする
                drawerFlg: false//ドロワーメニュー初期設定で非表示
            }
        },
        methods: {
            triggerOn: function() {
                this.active = !this.active
                this.drawerFlg = !this.drawerFlg
            }
        },
        mounted() {
            axios.get('/ajax/get/user')
            .then(Response => this.user = Response.data)
        },
    }
</script>

<style>
    .drawer-enter-active, .drawer-leave-active {
        transform: translate(0px, 0px);
        transition: transform 1s cubic-bezier(0, 0, 0.2, 1) 0ms;
    }
    .drawer-enter, .drawer-leave-to {
        transform: translateX(100vw) translateX(0px);
    }
</style>