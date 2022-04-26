import 'package:flutter/material.dart';
import 'package:shoponline_app/components/default_button.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/models/link.dart';
import 'package:shoponline_app/screens/bill/bill_screen.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:http/http.dart' as http;

class CheckOurCart extends StatelessWidget {
  const CheckOurCart({
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
                    text: "Tổng:\n",
                    children: [
                      TextSpan(
                        text: "${cul(cart.length, cart, cart)} VNĐ",
                        style: TextStyle(fontSize: 16, color: kPrimaryColor),
                      ),
                    ],
                  ),
                ),
                SizedBox(
                  width: getProportionateScreenWidth(190),
                  child: DefaultButton(
                    text: "Mua Ngay",
                    press: () {
                      myBill(context);
                      Navigator.pushNamed(context, BillScreen.routeName);
                    },
                  ),
                ),
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

void myBill(context) async {
  String a, e;
  e = SignForm.password1.text;

  a = SignForm.username.text;
  //djtconmeno.email = email;
  //djtconmeno.password = password;
  user = await fetchProducts(a, e);

  final response = await http.get(Uri.parse(link[11] + "${user[0].id}"));
  return _showToast(context);
}

void _showToast(BuildContext context) {
  final scaffold = ScaffoldMessenger.of(context);
  scaffold.showSnackBar(
    SnackBar(
      content: const Text('Đặt hàng thành công'),
    ),
  );
}
