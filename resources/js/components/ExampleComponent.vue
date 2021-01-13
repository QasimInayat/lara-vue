<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-light">Component 1</div>

                    <div class="card-body">
                        This is a {{name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component 1.')
        },
        data(){
            return{
                name: 'Component 1',
            }
        }
    }
</script>
