<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">PIPES</div>
                    <div class="input-group mb-3">
                        <input type="text" v-model="multisearch" placeholder="Enter Multi Search" key="search-input" class="form-control" />
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th hidden>id</th>
                                    <th>Code</th>
                                    <th>Product Type</th>
                                    <th>Item Desc</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(pipe, index) in filteredList" v-if="filteredList.length" :key="pipe.id">
                                    <td>{{ pipe.id }}</td>
                                    <td>{{ pipe.code }}</td>
                                    <td>{{ pipe.Product_type }}</td>
                                    <td>{{ pipe.item_desc }}</td>
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
    
    export default({
        data() {
            return {
                pipes: [],
                loading: true,
                multisearch : ""
            }
        },
        mounted(){
            this.axios
            .get('http://localhost:8000/api/data')
            .then(response => (
                    
                    this.pipes = response.data
                )
            )
        },
        computed: {
        filteredList() {
            if (this.pipes.length === 0 || this.multisearch == "") {
                return this.pipes;
            } else {
                return this.pipes.filter((pipe) => {
                    return pipe.code.toLowerCase().includes(this.multisearch.toLowerCase()) || pipe.Product_type.toLowerCase().includes(this.multisearch.toLowerCase()) || pipe.item_desc.toLowerCase().includes(this.multisearch.toLowerCase()) ;
                }); 
            }
        },
        }
    });

</script>