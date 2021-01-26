<template>
    <div>
        <div class="modal fade" id="viewTodoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View a Task</h5>
                            <button type="button" class="close" @click="clearModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="alert alert-success" v-if="success.length > 0">{{success}}</p>
                                    <label for="name">View TASK</label>
                                    <h4>{{rec.name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="clearModal" data-dismiss="modal">Close</button>
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
            clearModal(){
                this.errors = [];
                this.success = "";
            }
        }
    }
</script>
<style scoped>
</style>
