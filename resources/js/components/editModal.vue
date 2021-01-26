<template>
    <div>
        <div class="modal fade" id="editTodoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit a Task</h5>
                            <button type="button" class="close" @click="clearModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="alert alert-success" v-if="success.length > 0">{{success}}</p>
                                    <label for="name">Edit TASK</label>
                                    <textarea class="form-control" name="name" id="name" rows="3" v-model="rec.name"></textarea>
                                    <div v-if="errors.name"  class="mt-1">
                                        <span v-for="err of errors.name" class="text-danger">{{err}}<br></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearModal" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" @click="updateRecord()">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['rec'],
        data(){
            return {
                success: '',
                errors: [],
            }
        },
        methods:{
            updateRecord(){
                axios.post(this.$hostapi_url+'todo/'+this.rec.id,{
                    'name' : this.rec.name,
                    '_method' : "PUT"
                })
                .then(data => {
                    this.$emit('recordUpdated' ,data);
                    this.success = "Task updated successfully";
                    })
                .catch(error => this.errors = error.response.data.errors)
            },
            clearModal(){
                this.errors = [];
                this.success = "";
            }
        }
    }
</script>
<style scoped>
</style>
