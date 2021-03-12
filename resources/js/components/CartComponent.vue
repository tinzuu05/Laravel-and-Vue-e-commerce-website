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
                            <td class="cart_item_price" >NT${{ item.price * item.quantity }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';

    export default {
        props: ['items'],
        // computed:{
        //     itemTotal () {

        //         return this.items._.reduce((total, item) => total + item.price * item.quantity, 0)
        //     }
        // }
    }

</script>
