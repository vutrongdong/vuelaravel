<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User List
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user,index) in users" class="odd gradeX" align="center">
                            <td>{{ user.id }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.level }}</td>
                            <td><img width="100px" :src="'/upload/user/'+ user.image"></td>
                            <td v-if="user.status==1">Hiện</td>
                            <td v-else>Ản</td>
                            <td class="center" @click="Delete(user.id,index)"><i class="fa fa-trash-o  fa-fw"></i> Delete</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><router-link :to="{name:'EditUser',params: { iduser: user.id }}">Edit</router-link></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</template>

<script>
export default{
    data(){
        return {
            users:{}
        }
    },
    created(){
        this.fetchUser();
    },
    methods:{
        fetchUser(){
            this.$http.get('/User').then(response=>{
                this.users = response.data.users;
            })
        },
        Delete(id,index){
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
            .then((willDelete) =>{
              if (willDelete) {
                this.$http.delete('/User/'+id).then(response=>{
                     this.users.splice(index,1);
                    swal("Poof! Your imaginary file has been deleted!", {
                      icon: "success",
                  })
                })

            }
        });
        }

    }
}
</script>
