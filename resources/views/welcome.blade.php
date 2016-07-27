<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel='stylesheet' href="/css/bootstrap.css" type='text/css' media='all'/>
    </head>
    <body>
            <taska-app >

            </taska-app>
    <template id="tasks-template">
        <div class="container">
            <h1>My Tasks have</h1>
            <ul class="list-group">

                    <li class="list-group-item" v-for="task in list">
                        @{{task.body}}
                        <strong @click="deletetask(task)">删除</strong>
                    </li>

            </ul>
        </div>
    </template>

    <script src="/js/vue.js"></script>
            {{--<script src="/js/vue-resource.min.js"></script>--}}
    <script src="/js/jquery.min.js"></script>
    <script>
         Vue.component('taska-app',{
             template:'#tasks-template',
             data:function(){
                 return{
                     list:['dfsdf','dsafdsfsdf']
                 }
             },

             created:function(){
                 var vm=this;
//                 this.$http.get('api/tasks',function(data){
//                     alert(data);
//                     vm.list=data;
//                 });

                 $.getJSON('api/tasks',function(data){
                     vm.list=data;
                 });
             },

             methods:{
                 deletetask:function(task){
                     this.list.$remove(task);
                 }
             }
         });

        new Vue({
            el:"body"
        });
    </script>
    </body>
</html>
