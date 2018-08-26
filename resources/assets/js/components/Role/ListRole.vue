<template>
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Descript</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="role in roles">
                                <td>{{ role.name }}</td>
                                <td>{{ role.display_name }}</td>
                                <td>{{ role.description }}</td>
                                <td @click="deleteRole(role.id)" class="center"><i class="fa fa-trash-o  fa-fw"></i> Delete</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><router-link :to="'/role/'+role.id+'/update'">Edit</router-link></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            roles:{}
        }
    },
    created(){
        this.fetchRole();
    },
    methods:{
        fetchRole(){
            this.$http.get('/Role').then(response=>{
                this.roles = response.data.roles;
                console.log(response.data);
            })
        },
        deleteRole(role){
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
            .then((willDelete) =>{
              if (willDelete) {
                this.$http.delete('/Role/'+role).then(response=>{
                    // this.$router.push('/role');
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
