<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Promotion</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(prod,i) in allProduct" class="odd gradeX" align="center">
                            <td>{{ ++i }}</td>
                            <td>{{ prod.name }}</td>
                            <td>{{ prod.price }}</td>
                            <td>{{ prod.promotion }}</td>
                            <!-- :src="'upload/'+prod.image" -->
                            <td><img :src="'upload/product/'+prod.image" width="100px" alt=""></td>
                            <td>{{ prod.quantity }}</td>
                            <td v-if='prod.status==1'>Mới</td>
                            <td v-else>Cũ</td>
                            <td @click="deleteProd(prod.id)" class="center"><i class="fa fa-trash-o  fa-fw"></i> Delete</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><router-link :to="'/product/'+prod.id+'/update'">Edit</router-link></td>
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
    created(){
        this.actionFetchProduct();
    },
    computed:{
        ...mapGetters(['allProduct'])
    },
    methods:{
        ...mapActions(['actionFetchProduct','actionDeleteProd']),
        deleteProd(prod){
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                this.actionDeleteProd({
                   prod:prod,
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

// $('input'){
//     id = perms
//     =>check
// }
</script>
