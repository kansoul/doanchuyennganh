// ignore_for_file: deprecated_member_use, use_key_in_widget_constructors

import 'package:flutter/material.dart';
import 'package:shoponline_app/components/rounded_icon_btn.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/allproduct/list_product.dart';
import 'package:shoponline_app/screens/details/component/custom_app_bar.dart';
import 'package:shoponline_app/size_config.dart';

class AllPro1 extends StatelessWidget {
  static String routeName = "/allpro1";

  @override
  Widget build(BuildContext context) {
    final ProductDetailsArguments1 agrs =
        ModalRoute.of(context)!.settings.arguments as ProductDetailsArguments1;
    return Scaffold(
      backgroundColor: Color(0xFFF5F6F9),
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(AppBar().preferredSize.height),
        child: CustomAppBar(),
      ),
      body: Center(
        child: FutureBuilder<List<Product>>(
          future: agrs.products,
          builder: (context, snapshot) {
            if (snapshot.hasError) print(snapshot.error);

            return snapshot.hasData
                ? ProductBoxList(items: snapshot.data!)
                :

                // return the ListView widget :
                Center(child: CircularProgressIndicator());
          },
        ),
      ),
    );
  }
}

class ProductDetailsArguments1 {
  final Future<List<Product>> products;
  ProductDetailsArguments1({required this.products});
}
