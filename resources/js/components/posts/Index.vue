<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">PIPES</div>
                    
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>code</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(pipe, index) in pipes" :key="pipe.id">
                                    <td>{{ pipe.id }}</td>
                                    <td>{{ pipe.code }}</td>
                                    
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                pipes: []
            }
        },
        created() {
            let uri = `http://localhost:8000/api/data`;
            this.axios.get(uri).then(response => {
                this.pipes = response.data;
            });
        }
    }
</script>