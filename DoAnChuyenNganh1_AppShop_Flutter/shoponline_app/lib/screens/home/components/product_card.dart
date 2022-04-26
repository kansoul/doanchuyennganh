import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/link.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/cart/cart_screen.dart';
import 'package:shoponline_app/screens/home/components/icon_btn_with_counter.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:http/http.dart' as http;

List<User> user = [];

class ProductCard extends StatelessWidget {
  const ProductCard({
    Key? key,
    this.width = 140,
    this.aspecRetion = 1.02,
    required this.product,
    required this.press,
  }) : super(key: key);

  final double width, aspecRetion;
  final Product product;

  final GestureTapCallback press;
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.only(left: getProportionateScreenWidth(20)),
      child: GestureDetector(
        onTap: press,
        child: SizedBox(
          width: getProportionateScreenWidth(width),
          child: Column(
            children: [
              AspectRatio(
                aspectRatio: aspecRetion,
                child: Container(
                  padding: EdgeInsets.all(getProportionateScreenWidth(20)),
                  decoration: BoxDecoration(
                    color: kSecondaryColor.withOpacity(0.1),
                    borderRadius: BorderRadius.circular(15),
                  ),
                  child: Image.network(link[3] + "${product.img1}"),
                ),
              ),
              const SizedBox(
                height: 5,
              ),
              Text(
                product.title,
                style: TextStyle(color: Colors.black),
                maxLines: 2,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Text(
                    "${product.price} VNĐ",
                    style: TextStyle(
                      fontSize: getProportionateScreenWidth(17),
                      fontWeight: FontWeight.w600,
                      color: kPrimaryColor,
                    ),
                  ),
                  IconBtnWithCounter(
                      width: getProportionateScreenWidth(30),
                      height: getProportionateScreenHeight(30),
                      svgSrc: "assets/icons/Cart Icon.svg",
                      press: () => myFunction(context, product.id, 1, 1))
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}

void myFunction(context, int b, int c, int d) async {
  String a, e;
  e = SignForm.password1.text;

  a = SignForm.username.text;
  //djtconmeno.email = email;
  //djtconmeno.password = password;
  user = await fetchProducts(a, e);

  final response = await http.get(Uri.parse(
      "http://192.168.1.5/doanchuyennganh/public/api/cartadd/" +
          "${user[0].id}" +
          "/$b" +
          "/$c" +
          "/$d"));
  return _showToast(context);
}

void _showToast(BuildContext context) {
  final scaffold = ScaffoldMessenger.of(context);
  scaffold.showSnackBar(
    SnackBar(
      content: const Text('Added to card'),
    ),
  );
}
