<template>
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category Add
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <Form @formSubmit="Create()" v-bind:category="category,errors,type"></Form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</template>

<script>
import Form from './FormCate.vue';
export default{
    data(){
        return{
            category:{},
            errors:[],
            type:'create'
        };
    },
    components:{Form},
    methods:{
        Create(){
            this.$http.post('/CustomCate',this.category).then(response=>{
                        //lấy dữ liệu thông báo thánh công
                        this.success = response.data.message;
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
