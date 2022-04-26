import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shoponline_app/components/custom_bottom.dart';
import 'package:shoponline_app/enums.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/profile/conponents/body1.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';

import 'profile_menu.dart';
import 'profile_pic.dart';

Future<List<User>> products =
    fetchProducts(SignForm.username.text, SignForm.password1.text);

class ProfileDetail extends StatelessWidget {
  static String routeName = "/profiledetail";

  const ProfileDetail({
    Key? key,
  }) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          "Profile",
        ),
      ),
      body: Body1(
        products: products,
      ),
    );
  }
}
