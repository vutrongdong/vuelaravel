<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category List
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(cate,i) in allCate" class="odd gradeX" align="center">
                            <td>{{ ++i }}</td>
                            <td>{{ cate.name }}</td>
                            <td>{{ cate.slug }}</td>
                            <td @click="deletCate(cate.id)" class="center"><i class="fa fa-trash-o  fa-fw"></i> Delete</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <router-link :to="'/category/'+ cate.id+'/update'">Edit</router-link></td>
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

import { mapGetters,mapActions } from 'vuex'
export default{
    computed:{
        ...mapGetters(['allCate']),
    },
    mounted(){
        this.FetchCate();
    },
    methods:{
        ...mapActions(['FetchCate','actionDelete']),
        deletCate(cate){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    this.actionDelete({
                        cate:cate,
                        cb:()=>{
                          swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        })
                      }
                  })
                }
            });
        }
    }
}
</script>
