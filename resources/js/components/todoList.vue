<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Tasks</h4></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <a class="btn btn-primary" data-toggle="modal" href="#addTodoModal">ADD NEW</a>
                            </div>
                        </div>
                        <table class="table"  width="100%" >
                            <tr>
                                <th width="25%">S.No</th>
                                <th width="40%">Name</th>
                                <th width="35%">Action</th>

                            </tr>
                            <tr v-for="(t, index) in tasks.data" :key="t.id">
                                <td>{{++index}}</td>
                                <td>{{t.name}}</td>
                                <td><a  @click="getRecord(t.id)" data-toggle="modal" href="#editTodoModal" class="btn btn-success btn-sm">Edit</a>|<button @click="deleteTask(t.id)" class=" btn btn-danger btn-sm">Delete</button>|<a  data-toggle="modal" href="#viewTodoModal" @click="viewRecord(t.id)" class=" btn btn-primary btn-sm">Show</a></td>
                            </tr>
                             <pagination :data="tasks" :limit="4" @pagination-change-page="getResults"></pagination>
                        </table>

                    </div>
                    <div class="card-footer">
                        <small><i class="fa fa-copyright" aria-hidden="true"></i>Copyrights</small>
                    </div>
                </div>
            </div>
        </div>
         <div id="modal">
            <addTodoComponent @recordAdded="refreshRecord"></addTodoComponent>
            <editTodoComponent :rec="editRec" @recordUpdated="refreshRecord"></editTodoComponent>
            <viewTodoComponent :rec="editRec" ></viewTodoComponent>

        </div>
    </div>

</template>

<script>
import addTodoComponent from './createModal.vue';
import editTodoComponent from './editModal.vue';
import viewTodoComponent from './viewModal.vue';

export default {
    components: {
        addTodoComponent,
        editTodoComponent,
        viewTodoComponent,
    },
    data(){
        return{
            tasks:{},
            records:{},
            editRec:{},
            errors:[]
        }
    },
    methods:{
        // Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get(this.$hostapi_url+'todo?page=' + page)
                .then((res)=>{
                    this.tasks=res.data;
                })
                .catch(error => console.log(error));
        },
        refreshRecord(record){
            this.tasks  = record.data;
            record.success = "";
        },
        getRecord(id){
            axios.get(this.$hostapi_url+'todo/'+id+'/edit')
            .then(response => this.editRec = response.data)
            .catch(error => this.errors = error.response.data.errors)
            console.log(response.data)
        },
        viewRecord(id){
             axios.get(this.$hostapi_url+'todo/'+id)
                 .then(response => this.editRec = response.data)
                 .catch(error => this.errors = error.response.data.errors)
            console.log(response.data)
        },
        deleteTask(taskid){
            axios.delete(this.$hostapi_url+'todo/'+taskid,{
                    'id' : taskid,
            })
            .then(data => {
                this.$emit('recordUpdated' ,data);
                this.success = "Task deleted  successfully";
            })
            .catch()
        }
    },
    mounted(){
        this.getResults();
    }
}
</script>

<style scoped>

</style>
