// ignore_for_file: deprecated_member_use, use_key_in_widget_constructors

import 'package:flutter/material.dart';
import 'package:shoponline_app/components/rounded_icon_btn.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/details/component/custom_app_bar.dart';
import 'package:shoponline_app/size_config.dart';

import 'component/body.dart';

class DetailsScreen extends StatelessWidget {
  static String routeName = "/details";

  @override
  Widget build(BuildContext context) {
    final ProductDetailsArguments agrs =
        ModalRoute.of(context)!.settings.arguments as ProductDetailsArguments;
    return Scaffold(
      backgroundColor: Color(0xFFF5F6F9),
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(AppBar().preferredSize.height),
        child: CustomAppBar(),
      ),
      body: Body(
        product: agrs.product,
      ),
    );
  }
}

class ProductDetailsArguments {
  final Product product;
  ProductDetailsArguments({required this.product});
}
