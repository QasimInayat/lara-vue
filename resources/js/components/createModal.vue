<template>
    <div>
        <div class="modal fade" id="addTodoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a Task</h5>
                            <button type="button" class="close" @click="clearModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="alert alert-success" v-if="success.length > 0">{{success}}</p>
                                    <label for="name">ADD TASK</label>
                                    <textarea class="form-control" name="name" id="name" rows="3" v-model="addTodo"></textarea>
                                    <div v-if="errors.name"  class="mt-1">
                                        <span v-for="err of errors.name" class="text-danger">{{err}}<br></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="addRecord">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                success: '',
                errors: [],
                addTodo: '',
            }
        },
        methods:{
            addRecord(){
                axios.post(this.$hostapi_url+'todo',{
                    'name'    :     this.addTodo ,
                })
                .then(data => {
                    this.$emit('recordAdded', data);
                    this.success = "Task Added";
                    this.addTodo="";
                    this.success="";
                })
                .catch(error =>{
                    this.errors = error.response.data.errors;
                })

            },
            clearModal(){
                this.errors = [];
                this.record = "";
                this.success = "";
            }
        }
    }
</script>
<style scoped>
</style>
