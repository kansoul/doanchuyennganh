import 'package:flutter/material.dart';
import 'package:shoponline_app/constant.dart';

import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/models/link.dart';
import 'package:shoponline_app/size_config.dart';

class CartItemCard extends StatelessWidget {
  const CartItemCard({
    Key? key,
    required this.cart,
  }) : super(key: key);
  final Cart1 cart;

  @override
  Widget build(BuildContext context) {
    return Row(
      children: [
        SizedBox(
          width: getProportionateScreenWidth(88),
          child: AspectRatio(
            aspectRatio: 0.88,
            child: Container(
              padding: EdgeInsets.all(10),
              decoration: BoxDecoration(
                color: Color(0xFFF5F6F9),
                borderRadius: BorderRadius.circular(15),
              ),
              child: Image.network(link[3] + cart.img1),
            ),
          ),
        ),
        SizedBox(
          width: getProportionateScreenWidth(20),
        ),
        Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              cart.title,
              style: TextStyle(fontSize: 16, color: Colors.black),
              maxLines: 2,
            ),
            const SizedBox(
              height: 10,
            ),
            Text.rich(TextSpan(
              text: "\$${cart.price}",
              style: TextStyle(
                fontWeight: FontWeight.w600,
                color: kPrimaryColor,
              ),
              children: [
                TextSpan(
                    text: " x${cart.qlt}", style: TextStyle(color: kTextColor))
              ],
            )),
          ],
        ),
      ],
    );
  }
}
