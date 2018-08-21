<template>
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form  @submit.prevent="update">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input v-model="category.name" class="form-control" name="name" placeholder="Please Enter Category Name" />
                                <p style="color:red;"></p>
                            </div>
                            <button type="submit" class="btn btn-success">Category Edit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            category:{
            }
        }
    },
    created(){
        this.getCategory();
    },
    methods:{
        getCategory(){
            this.$http.get('CustomCate/'+ this.$route.params.idcate+'/edit').then(response =>{
                this.category = response.data.values;
                console.log(response.data);
            })
        },
        update(){
            this.$http.patch('CustomCate/'+ this.$route.params.idcate,this.category).then(response=>{
                console.log(response.data)
            }
                    // this.$router.push('/category')

         );
        }
    }
}
</script>
