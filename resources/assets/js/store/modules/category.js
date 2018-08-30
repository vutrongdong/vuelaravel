import {
  FETCHING_RESOURCES,
  FETCHING_RESOURCES_DONE,
  FETCHING_RESOURCES_FAIL,

  FETCH_CATEGORY,
  DELETE_CATEGORY,
  FETCH_EDIT_CATE
} from '../mutation-type'

const state ={
  category:[]
}

const mutations = {
  [FETCH_CATEGORY](state,category){
    return state.category = category;
  },
  [FETCH_EDIT_CATE](state,category){
    return state.category = category;
  },
  [DELETE_CATEGORY](state,id){
    return state.category = state.category.filter((cate)=> cate.id !==id )
  }
}
const getters ={
  allCate: (state)=>state.category,
  getCateById: (state)=>state.category
}

const actions ={
  async FetchCate({commit}){
     // if (this.getters.allCategories.length == 0)
    let response = await axios.get('/CustomCate').then(response=>{
      commit(FETCH_CATEGORY,response.data.values)
    });
  },

  async FetchCateForEdit({commit},payload){
    let response = await axios.get('/CustomCate').then(response=>{
      commit(FETCH_EDIT_CATE,response.data.values)
    })
  },

  async actionDelete({commit},payload){
 const { cate,cb } = payload || {}
    let response = await axios.delete('/CustomCate/'+cate).then(response=>{
        commit(DELETE_CATEGORY,cate)
    });
  },

  async pushCate({commit},payload){
    commit(FETCHING_RESOURCES)
    const { category,cb } = payload || {}

    try {
      if (category.id) {
      let response =await axios.put('/CustomCate/'+category.id,category)
      cb && cb(response.data.data)
    }else{
      let response =  await axios.post('/CustomCate',category)
      cb && cb(response.data.data)
    }
    commit(FETCHING_RESOURCES_DONE)
  }catch (err) {
      commit(FETCHING_RESOURCES_FAIL, err)
    }
  }
}

export default{
  state,
  mutations,
  actions,
  getters
}
