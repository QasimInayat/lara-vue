<template>
    <div>
        <div class="modal fade" id="addTodoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                })
                .catch(error => console.log(error))
                this.addTodo="";
                this.success="";

            }
        }
    }
</script>
<style scoped>
</style>
