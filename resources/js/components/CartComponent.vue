<template>
    <div id="app">
        <div class="shopping-cart-wrapper">
            <div class="cart_content">
                <table class="table">
                    <thead>
                        <th colspan="2">商品</th>
                        <th class="cart_item_qty">數量</th>
                        <th class="cart_item_price">單價</th>
                        <th class="cart_item_tprice">總金額</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <tr v-for="item in items" :key="item.name">
                            <td class="cart_item_img"><img :src="item.attributes.image" width="100px" height="100px"/></td>
                            <td>{{ item.name }}</td>
                            <td class="cart_item_qty">
                                <input type="number" v-model="item.quantity" class="form-control" min="1" step="1"/>
                            </td>
                            <td class="cart_item_price" >NT${{ item.price }}</td>
                            <td class="cart_item_price">NT${{ item.price * item.quantity }}</td>
                            <button>Remove</button>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="total">總金額: NT${{ itemTotal }}</div>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        computed:{
            itemTotal () {
                return Object.values(this.items).reduce((total, item) => total + item.price * item.quantity, 0)
            }
        },
    }

</script>

<style>
    button{
        margin-top: 10px;
        border: gray solid 2px;
        border-radius: 5px;
    }

    .total {
        float: right;
    }
</style>
