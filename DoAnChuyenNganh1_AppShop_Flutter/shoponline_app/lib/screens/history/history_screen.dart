import 'package:flutter/material.dart';

import 'package:shoponline_app/fetchdata/fetchdata_history.dart';

import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/screens/history/components/body2.dart';
import 'package:shoponline_app/screens/history/components/total.dart';

import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';

class HistoryScreen extends StatelessWidget {
  static String routeName = "/hist";
  Future<List<Cart1>> cart = fetchHistory(SignForm.username.text);
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
                ? Body2(items: snapshot.data!)
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
                ? CheckOurHistory(cart: snapshot.data!)
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
            "Đơn hàng đã hoàn thành",
            style: TextStyle(color: Colors.black),
          ),
          FutureBuilder(
              future: cart,
              builder: (context, AsyncSnapshot snapshot) {
                if (!snapshot.hasData) {
                  return Center(child: CircularProgressIndicator());
                }
                return Text(
                  "${snapshot.data.length} items",
                  style: Theme.of(context).textTheme.caption,
                );
              }),
        ],
      ),
    );
  }
}
