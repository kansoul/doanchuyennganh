import 'package:flutter/material.dart';
import 'package:shoponline_app/components/default_button.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_cart.dart';
import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/screens/cart/components/AddCart.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';

import 'components/body.dart';

class CartScreen extends StatelessWidget {
  static String routeName = "/cart";
  Future<List<Cart1>> cart = fetchCart1(SignForm.username.text);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: buildAppBar(context),
      body: Center(
        child: FutureBuilder<List<Cart1>>(
          future: cart,
          builder: (context, snapshot) {
            if (snapshot.hasError) print(snapshot.error);

            return snapshot.hasData
                ? Body(items: snapshot.data!)
                :

                // return the ListView widget :
                Center(child: CircularProgressIndicator());
          },
        ),
      ),
      bottomNavigationBar: Container(
        child: FutureBuilder<List<Cart1>>(
          future: cart,
          builder: (context, snapshot) {
            if (snapshot.hasError) print(snapshot.error);

            return snapshot.hasData
                ? CheckOurCart(cart: snapshot.data!)
                :

                // return the ListView widget :
                Center(child: CircularProgressIndicator());
          },
        ),
      ),
    );
  }

  AppBar buildAppBar(BuildContext context) {
    return AppBar(
      title: Column(
        children: [
          Text(
            "Giỏ hàng",
            style: TextStyle(color: Colors.black),
          ),
          FutureBuilder(
              future: cart,
              builder: (context, AsyncSnapshot snapshot) {
                if (!snapshot.hasData) {
                  return Center(child: CircularProgressIndicator());
                }
                return Text(
                  "${snapshot.data.length} sản phẩm",
                  style: Theme.of(context).textTheme.caption,
                );
              }),
        ],
      ),
    );
  }
}
