<template>
   <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Post</h1>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>User ID</th>
                       <!--  <th>Delete</th>
                        <th>Edit</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{ posts.id }}</td>
                        <td>{{ posts.title }}</td>
                        <td>{{ posts.body }}</td>
                        <td>{{ posts.user_id }}</td>
                        <!-- <td @click="deletCate(cate.id)" class="center"><i class="fa fa-trash-o  fa-fw"></i> Delete</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <router-link :to="'/category/'+ cate.id+'/update'">Edit</router-link></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return {
            posts:{}
        }
    },
    created(){
        this.fetchPost();
    },
    methods:{
        fetchPost(){
            this.$http.get('/posts/'+ this.$route.params.idp).then(response=>{
                this.posts = response.data.values;
                console.log(this.posts);
            });
        }
    }
}

</script>
