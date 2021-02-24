<template>
    <div class="p-todopg__bigbg">
        <div class="p-todopg__block">
            <!-- ページタイトル -->
            <p class="p-todopg__title">TO DO LIST - mypage -</p>
            <!-- リスト作成フォームエリア -->
            <form class="u-mb-30" method="POST" novalidate="novalidate">
                <div class="p-todopg__form">
                    <input ref="editor" class="p-todopg__input" type="text" name="text" v-model="new_todo" autocomplete="off">
                    <!-- bottun -->
                    <button @click="send()" class="p-todopg__form-btn" type="button">{{changeButtonText}}</button>
                </div> 
            </form>
            <!-- リスト一覧エリア -->
            <ul class="p-todopg__list">    
                <transition-group name="fade">
                    <li v-for="(todo,index) in todos" :key="todo.id" class="p-todopg__list-item">
                        {{todo.text}}
                        
                        <!-- ボタンエリア -->
                        <div class="p-todopg__icon-wrap">
                            <!-- 編集ボタン -->
                            <button @click="edit(index)" class="p-todopg__icon-btn p-todopg__icon-btn--info u-mr-10">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>                          
                            </button>
                            <!-- 削除ボタン -->
                            <button @click="deleteTodo(todo.id,index)" type="button" class="p-todopg__icon-btn p-todopg__icon-btn--delete">
                                <i class="fas fa-trash-alt" aria-hidden="true"></i>
                            </button>
                        </div>
                    </li>
                </transition-group>
            </ul>
        </div> 
    </div>
</template>

<script>
    export default {
        data() {
            return {
                new_todo: '',//追加されたtodo
                todos: [],//ユーザーの総todo
                editIndex: -1,//追加・編集ボタンの切り替え用
                editId: '',//編集時選択されたtodo
            }
        },
        methods: {
            //追加・編集ボタンで処理を振り分け
            send() {
                if(this.editIndex === -1) {
                    this.addTodo()
                } else {
                    this.editTodo()
                }
                this.cancel()//送信後のリセット
            },
            edit(index) {//編集ボタン押下時に設定
                this.editIndex = index//送信ボタンを「編集」に切り替える
                this.editId = this.todos[index].id//選択したtodo.id
                this.new_todo = this.todos[index].text//formのv-model:new_todoの表示用の値
                this.$refs.editor.focus()//formのinput要素にフォーカス設定
            },
            cancel() {
                this.new_todo = ''
                this.edit_id = ''
                this.editIndex = -1
            },
            //登録
            addTodo : function() {
                axios.post('/ajax/add',{
                    text: this.new_todo
                }).then((response) => {
                    this.todos = response.data
                }).catch((error) => {
                    alert('メッセージ送信に失敗しました。')
                    console.log(error)
                })
            },
            //編集
            editTodo : function() {
                axios.post('/ajax/edit/' + this.editId,{
                    text: this.new_todo
                }).then((response) => {
                    this.todos = response.data
                }).catch((error) => {
                    alert('メッセージ送信に失敗しました。')
                    console.log(error)
                })
            },
            //削除
            deleteTodo : function(id, index) {
                axios.delete('/ajax/delete/' + id)
                .then((response) => {
                    console.log(response)
                    this.todos.splice(index,1)
                    // this.todos = response.data
                }).catch((error) => {
                    alert('削除に失敗しました。')
                    console.log(error)
                })
            },
        },
        computed: {
            changeButtonText() {
                return this.editIndex === -1 ? '追加' : '編集'
            }
        },
        mounted() {
            axios.get('/ajax/get').then((response) => {
                this.todos = response.data
                    console.log(response)
                    console.log(this.todos)
                });
            // .then(Response => this.todos = Response.data)
            },
            
    }
</script>

<style scoped>
    .fade-leave-active,
    .fade-enter-active {
        transition: opacity .5s, transform .5s ease;
    }
    .fade-leave-to,
    .fade-enter {
        opacity: 0;
        transform: translateX(50px);
    }
    .fade-leave,
    .fade-enter-to {
        opacity: 1;
    }
</style>
