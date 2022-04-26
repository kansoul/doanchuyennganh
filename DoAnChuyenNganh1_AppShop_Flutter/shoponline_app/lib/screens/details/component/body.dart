import 'package:flutter/material.dart';
import 'package:shoponline_app/components/default_button.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:http/http.dart' as http;
import 'product_description.dart';
import 'product_images.dart';
import 'top_rounder_container.dart';

class Body extends StatelessWidget {
  final Product product;

  const Body({Key? key, required this.product}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        ProductImages(product: product),
        TopRounderContainer(
          color: Colors.white,
          child: ProductDescription(
            product: product,
            pressOnSeeMore: () {},
          ),
        ),
        TopRounderContainer(
          color: Color(0xFFF6F7F9),
          child: Column(
            children: [
              TopRounderContainer(
                  color: Colors.white,
                  child: Padding(
                    padding: EdgeInsets.only(
                      left: SizeConfig.screenWidth * 0.15,
                      right: SizeConfig.screenWidth * 0.15,
                      top: getProportionateScreenWidth(15),
                      bottom: getProportionateScreenWidth(5),
                    ),
                    child: DefaultButton(
                      text: "Add to Cart",
                      press: () {},
                    ),
                  ))
            ],
          ),
        )
      ],
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
