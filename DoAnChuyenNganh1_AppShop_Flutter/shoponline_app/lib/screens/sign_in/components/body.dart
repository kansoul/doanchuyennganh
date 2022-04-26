import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:shoponline_app/components/custom_surfix_icon.dart';
import 'package:shoponline_app/components/default_button.dart';
import 'package:shoponline_app/components/form_error.dart';
import 'package:shoponline_app/components/no_account_text.dart';
import 'package:shoponline_app/components/socal_cart.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/screens/forgot_passowrd/forgot_passoword_screen.dart';
import 'package:shoponline_app/size_config.dart';

import 'sign_form.dart';

class Body extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: SizedBox(
        width: double.infinity,
        child: Padding(
          padding:
              EdgeInsets.symmetric(horizontal: getProportionateScreenWidth(20)),
          child: SingleChildScrollView(
            child: Column(
              children: [
                SizedBox(
                  height: SizeConfig.screenHeight * 0.05,
                ),
                Text(
                  "Welcome",
                  style: TextStyle(
                    color: Colors.black,
                    fontSize: getProportionateScreenWidth(28),
                    fontWeight: FontWeight.bold,
                  ),
                ),
                Text(
                  "Sign In with your email  and password \nor countinue with social media",
                  textAlign: TextAlign.center,
                ),
                SizedBox(
                  height: SizeConfig.screenHeight * 0.08,
                ),
                SignForm(),
                SizedBox(
                  height: SizeConfig.screenHeight * 0.08,
                ),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    SocalCart(
                      icon: "assets/icons/google-icon.svg",
                      press: () {},
                    ),
                    SocalCart(
                      icon: "assets/icons/facebook-2.svg",
                      press: () {},
                    ),
                    SocalCart(
                      icon: "assets/icons/twitter.svg",
                      press: () {},
                    ),
                  ],
                ),
                NoAccountText(),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
