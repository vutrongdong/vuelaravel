<template>
    <form @submit.prevent="formSubmit" method="post">
        <div class="form-group">
            <label>Role Name</label>
            <input v-model="role.name" class="form-control" name="name" placeholder="Please Enter Category Name" v-validate="'required|min:3|max:10'" />
            <!-- max_value và min_value được sử dụng trong trường hợp đo gía trị số -->
            <div v-show="errors.has('name')" class="text-danger">{{ errors.first('name') }}</div>
            <!-- <p style="color:red;" v-if="errors.name">{{ errors.name[0] }}</p> -->
        </div>
        <div class="form-group">
            <label>Display Name</label>
            <input v-model="role.display_name" class="form-control" name="display_name" placeholder="Please Enter Category Name" v-validate="'required|min:3|max:10'" />
            <!-- max_value và min_value được sử dụng trong trường hợp đo gía trị số -->
            <div v-show="errors.has('display_name')" class="text-danger">{{ errors.first('display_name') }}</div>
            <!-- <p style="color:red;" v-if="errors.name">{{ errors.name[0] }}</p> -->
        </div>
        <div class="form-group">
            <label>Description</label>
            <input v-model="role.description" class="form-control" name="description" placeholder="Please Enter Category Name" v-validate="'required|min:3|max:10'" />
            <!-- max_value và min_value được sử dụng trong trường hợp đo gía trị số -->
            <div v-show="errors.has('description')" class="text-danger">{{ errors.first('description') }}</div>
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
export default{

}
</script>
