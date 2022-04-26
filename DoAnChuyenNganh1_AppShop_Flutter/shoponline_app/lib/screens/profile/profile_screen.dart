import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shoponline_app/components/custom_bottom.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/enums.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/home/home_screen.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'conponents/body.dart';

class ProfileScreen extends StatelessWidget {
  static String routeName = "/profile";
  Future<List<User>> user =
      fetchProducts(SignForm.username.text, SignForm.password1.text);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          "Profile",
        ),
      ),
      body: Body(
        products: user,
      ),
      bottomNavigationBar: CustomBottomNavBar(
        selectedMenu: MenuState.profile,
      ),
    );
  }
}
