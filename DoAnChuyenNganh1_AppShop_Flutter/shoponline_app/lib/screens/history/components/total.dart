import 'package:flutter/material.dart';
import 'package:shoponline_app/components/default_button.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/size_config.dart';

class CheckOurHistory extends StatelessWidget {
  const CheckOurHistory({
    Key? key,
    required this.cart,
  }) : super(key: key);
  static int total = 0;
  static List<int> text = [];
  final List<Cart1> cart;

  @override
  Widget build(BuildContext context) {
    List<int> text1 = [1, 2, 3, 4];
    return Container(
      padding: EdgeInsets.symmetric(
          vertical: getProportionateScreenWidth(15),
          horizontal: getProportionateScreenWidth(30)),
      height: 100,
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.only(
            topLeft: Radius.circular(30), topRight: Radius.circular(30)),
        boxShadow: [
          BoxShadow(
              offset: Offset(0, -15),
              blurRadius: 20,
              color: Color(0xFFDADADA).withOpacity(0.15)),
        ],
      ),
      child: SafeArea(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text.rich(
                  TextSpan(
                    text: "Total:\n",
                    children: [
                      TextSpan(
                        text: "${cul(cart.length, cart, cart)} VNĐ",
                        style: TextStyle(fontSize: 16, color: kPrimaryColor),
                      ),
                    ],
                  ),
                ),
                Text("Tình trạng: Đã hoàn thành")
              ],
            ),
          ],
        ),
      ),
    );
  }
}

int cul(int a, List<Cart1> b, List<Cart1> c) {
  int d = 0;
  for (int i = 0; i < a; i++) {
    d = d + b[i].price * c[i].qlt;
  }
  return d;
}
