<template>
    <div>
        <button type="button" class="btn btn-primary" @click="submit(productId)">いいね！</button>
    </div>
</template>

<script>
    export default {
        props: ['productId', 'userId'],

        methods: {
            submit(productId) {
                let url = `/api/products/${productId}/favorite`
            
                axios.product(url, {
                    user_id: $this.userId
                })
                .then(response => {

                })
                .catch(error =>{
                    alert(error)
                });
            }       
        }
    }
</script>
