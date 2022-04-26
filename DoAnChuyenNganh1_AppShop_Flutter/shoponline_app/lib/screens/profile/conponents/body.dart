import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/bill/bill_screen.dart';
import 'package:shoponline_app/screens/history/history_screen.dart';
import 'package:shoponline_app/screens/profile/conponents/detail_profile.dart';
import 'package:shoponline_app/screens/sign_in/sign_in_screen.dart';

import 'profile_menu.dart';
import 'profile_pic.dart';

class Body extends StatelessWidget {
  final Future<List<User>> products;

  const Body({Key? key, required this.products}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return SingleChildScrollView(
      padding: EdgeInsets.symmetric(vertical: 20),
      child: Column(
        children: [
          ProfilePic(
            products: products,
          ),
          SizedBox(height: 20),
          ProfileMenu(
            text: "Tài khoản",
            icon: "assets/icons/User Icon.svg",
            press: () => {
              Navigator.pushNamed(context, ProfileDetail.routeName),
            },
          ),
          ProfileMenu(
            text: "Đơn hàng của tôi",
            icon: "assets/icons/Bill Icon.svg",
            press: () {
              Navigator.pushNamed(context, BillScreen.routeName);
            },
          ),
          ProfileMenu(
            text: "Lịch sử đặt hàng",
            icon: "assets/icons/Discover.svg",
            press: () {
              Navigator.pushNamed(context, HistoryScreen.routeName);
            },
          ),
          ProfileMenu(
            text: "Trợ giúp",
            icon: "assets/icons/Question mark.svg",
            press: () {},
          ),
          ProfileMenu(
            text: "Đăng xuất",
            icon: "assets/icons/Log out.svg",
            press: () => {Navigator.pushNamed(context, SignInScreen.routeName)},
          ),
        ],
      ),
    );
  }
}
