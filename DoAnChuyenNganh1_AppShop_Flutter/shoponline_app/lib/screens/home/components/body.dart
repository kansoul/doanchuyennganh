// ignore_for_file: deprecated_member_use

import 'package:flutter/material.dart';
import 'package:shoponline_app/fetchdata/fetchdata_product.dart';
import 'package:shoponline_app/fetchdata/fetchdata_slide.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/models/slide.dart';

import 'package:shoponline_app/size_config.dart';

import 'categories.dart';
import 'home_header.dart';
import 'popular_product.dart';

import 'special_offers.dart';

Future<List<Slide>> slide = fetchSlide();
Future<List<Product>> product = fetchProduct();

class Body extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: SingleChildScrollView(
        child: Column(
          children: [
            SizedBox(
              height: getProportionateScreenWidth(30),
            ),
            HomeHeader(),
            SizedBox(
              height: getProportionateScreenWidth(20),
            ),
            SpecialOffers(
              products: slide,
            ),
            SizedBox(
              height: getProportionateScreenWidth(25),
            ),
            Categories(),
            SizedBox(
              height: getProportionateScreenWidth(30),
            ),
            PopularProducts(
              products: product,
            ),
          ],
        ),
      ),
    );
  }
}
