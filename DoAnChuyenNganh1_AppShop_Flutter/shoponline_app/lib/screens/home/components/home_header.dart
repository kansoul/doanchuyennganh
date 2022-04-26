import 'package:flutter/material.dart';
import 'package:shoponline_app/screens/cart/cart_screen.dart';
import 'package:shoponline_app/size_config.dart';

import 'icon_btn_with_counter.dart';
import 'search_field.dart';

class HomeHeader extends StatelessWidget {
  const HomeHeader({
    Key? key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding:
          EdgeInsets.symmetric(horizontal: getProportionateScreenWidth(20)),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          SearchField(),
          IconBtnWithCounter(
            width: getProportionateScreenWidth(46),
            height: getProportionateScreenHeight(46),
            svgSrc: "assets/icons/Cart Icon.svg",
            press: () => Navigator.pushNamed(context, CartScreen.routeName),
          ),
          IconBtnWithCounter(
            width: getProportionateScreenWidth(46),
            height: getProportionateScreenHeight(46),
            svgSrc: "assets/icons/Bell.svg",
            numOfItems: 3,
            press: () {},
          ),
        ],
      ),
    );
  }
}
