// ignore_for_file: deprecated_member_use, use_key_in_widget_constructors

import 'package:flutter/material.dart';
import 'package:shoponline_app/components/rounded_icon_btn.dart';
import 'package:shoponline_app/fetchdata/fetchdata_product.dart';
import 'package:shoponline_app/fetchdata/fetchdata_search.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/allproduct/all_product.dart';
import 'package:shoponline_app/screens/details/component/custom_app_bar.dart';
import 'package:shoponline_app/screens/home/components/body.dart';
import 'package:shoponline_app/screens/home/components/search_field.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';

import 'list_product.dart';

class Search extends StatelessWidget {
  static String routeName = "/search";

  Future<List<Product>> products = fetchSearch(SearchField.search1.text);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Color(0xFFF5F6F9),
        appBar: PreferredSize(
          preferredSize: Size.fromHeight(AppBar().preferredSize.height),
          child: CustomAppBar(),
        ),
        body: Center(
          child: FutureBuilder<List<Product>>(
            future: products,
            builder: (context, snapshot) {
              if (snapshot.hasError) print(snapshot.error);

              return snapshot.hasData
                  ? ProductBoxList(items: snapshot.data!)
                  :

                  // return the ListView widget :
                  Center(child: CircularProgressIndicator());
            },
          ),
        ));
  }
}
