<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Simple Checkout for $25.00</div>

                    <div class="panel-body">
                        <form action="/purchases" method="POST">

                            <input type="hidden" name="stripeEmail" v-model="stripeEmail">
                            <input type="hidden" name="stripeToken" v-model="stripeToken">

                            <button class="btn btn-primary" @click.prevent="buyNow">Pay with stripe</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            stripe: {},
            stripeEmail: "",
            stripeToken: ""
        }),
        created(){
            this.stripe = StripeCheckout.configure({
                key: Sourov.stripeKey,
                locale: "auto",
                image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                token: (token) => {
                    this.stripeEmail = token.email;
                    this.stripeToken = token.id;

                    axios.post("/purchases", {
                        stripeEmail: this.stripeEmail,
                        stripeToken: this.stripeToken
                    }).then(res => {
                        console.log(res.data);
                        alert("Complete!");
                    });
                }
            });
        },
        methods: {
            buyNow(){
                this.stripe.open({
                    name: "Sourov Roy Checkout",
                    description: "This is crated for learning purpose only.",
                    amount: 2500
                });
            }
        }
    }
</script>
