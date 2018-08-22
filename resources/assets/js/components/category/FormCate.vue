<template>
    <form @submit.prevent="formSubmit" method="post">
        <div class="form-group">
            <label>Category Name</label>
            <input v-model="category.name" class="form-control" name="name" placeholder="Please Enter Category Name" v-validate="'required|min:3|max:10'" />
            <!-- max_value và min_value được sử dụng trong trường hợp đo gía trị số -->
            <div v-show="errors.has('name')" class="text-danger">{{ errors.first('name') }}</div>
            <!-- <p style="color:red;" v-if="errors.name">{{ errors.name[0] }}</p> -->
        </div>
        <div class="col-12">
            <button class="btn btn-success" type="submit"><span v-if="this.type === 'create'">Add Cate</span><span v-else>Edit Cate</span></button>
            <button type="reset" class="btn btn-info">Reset</button>
            <router-link to="/category" class="btn btn-primary">Trở lại</router-link>
        </div>
    </form>
</template>

<script>
import Notifications from 'vue-notification'

export default{
    props:['category','type'],
    methods:{
        formSubmit () {
            this.$validator.validate().then(result => {
                if (result) {
                    let category = Object.assign({}, this.category)
                    this.$emit('submit', category)

                } else {
                    this.$notify({
                      group: 'foo',
                      title: 'Cảnh báo !',
                      text: 'Thông tin nhập không chính xác!',
                      type:'error'
                  });
                }
            })
        }
    }
}
</script>

<style scope>
    .error{
        color: #fff;
        border-radius: 10px;
        height: 60px;
    }
</style>
