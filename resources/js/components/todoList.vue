<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Tasks</h4></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <button class="btn btn-primary">ADD NEW</button>
                            </div>
                        </div>
                        <table class="table"  width="100%" >
                            <tr>
                                <th width="25%">S.No</th>
                                <th width="40%">Name</th>
                                <th width="35%">Action</th>

                            </tr>
                            <tr v-for="t in tasks.data" :key="t.id">
                                <td>{{t.id}}</td>
                                <td>{{t.name}}</td>
                                <td><button class="btn btn-success btn-sm">Edit</button>|<button class=" btn btn-danger btn-sm">Delete</button>|<button class=" btn btn-primary btn-sm">Show</button></td>
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
    </div>
</template>

<script>

export default {
    data(){
        return{
            tasks:{},
        }
    },
    methods:{
        // Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get(this.$hostapi_url+'todo?page=' + page)
                .then((res)=>{
                    this.tasks=res.data;
                    console.log(this.tasks)
                })
                .catch(error => console.log(error));
		}
    },
    mounted(){
        this.getResults();
    }
}
</script>

<style scoped>

</style>
