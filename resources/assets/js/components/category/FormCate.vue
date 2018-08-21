<template>
    <form @submit.prevent method="post">
        <div class="form-group">
            <label>Category Name</label>
            <input v-model="category.name" class="form-control" name="name" placeholder="Please Enter Category Name" />
            <p style="color:red;" v-if="errors.name">{{ errors.name[0] }}</p>
        </div>
        <div class="col-12">
            <button @click="$emit('formSubmit')" class="btn btn-success" type="submit"><span v-if="this.type === 'create'">Add Cate</span><span v-else>Edit Cate</span></button>
            <button type="reset" class="btn btn-info">Reset</button>
            <router-link to="/category" class="btn btn-primary">Trở lại</router-link>
        </div>
    </form>
</template>

<script>
export default{
    props:['category','errors','type']
}
</script>
