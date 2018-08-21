<template>
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <div id="success">
                            {{ success }}
                        </div>
                        <form @submit.prevent="createCate" action="" method="POST">
                            <!-- {{ csrf_field() }} -->
                            <div class="form-group">
                                <label>Category Name</label>
                                <input v-model="categories.name" class="form-control" name="name" placeholder="Please Enter Category Name" />
                                <p style="color:red;" v-if="errors.name">{{ errors.name[0] }}</p>
                            </div>
                            <button type="submit" class="btn btn-success">Category Add</button>
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
            category:[],
            errors:[],
            success:'',
            categories:{
                name:'',
            }
        };
    },
    created(){
        this.fetchCate();
    },
    methods:{
        fetchCate(){
            this.$http.get('/CustomCate').then(response=>{
                this.category = response.data.values});

        },
        createCate(){
            this.$http.post('/CustomCate',this.categories).then(response=>{
                        //lấy dữ liệu để truyền vào mảng trên
                        this.categories = response.data.values;
                        //lấy dữ liệu thông báo thánh công
                        this.success = response.data.message;
                        console.log(response.data);
                        //nếu thêm thành công thì thực hiện reset dữ liệu nhập
                        this.categories = { name:''};
                        this.$router.push('/category');
                        if(this.errors){
                            this.errors =[];
                        }
                        $(document).ready(function() {
                            $('#success').addClass('alert alert-success').fadeOut(3000);
                        });
                        console.log(response.data);
                    },response=>{
                        this.errors= response.data.errors;
                    });
        }
    }
}
</script>
