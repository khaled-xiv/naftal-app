<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h1>salam</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  imageUploader from "./imageUploader";


    export default {
        mounted() {
            console.log('Component mounted.')
        },
        component: {
            imageUploader
        }
    }
</script>
