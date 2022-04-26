import 'package:flutter/material.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/allproduct/all_pro.dart';
import 'package:shoponline_app/screens/allproduct/all_pro1.dart';
import 'package:shoponline_app/screens/allproduct/all_product.dart';
import 'package:shoponline_app/screens/allproduct/search_product.dart';
import 'package:shoponline_app/screens/bill/bill_screen.dart';
import 'package:shoponline_app/screens/cart/cart_screen.dart';
import 'package:shoponline_app/screens/details/details_screen.dart';
import 'package:shoponline_app/screens/forgot_passowrd/forgot_passoword_screen.dart';
import 'package:shoponline_app/screens/home/home_screen.dart';
import 'package:shoponline_app/screens/login_success/login_success_screen.dart';
import 'package:shoponline_app/screens/profile/conponents/detail_profile.dart';
import 'package:shoponline_app/screens/profile/profile_screen.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/screens/sign_in/sign_in_screen.dart';
import 'package:shoponline_app/screens/splash/splash_screen.dart';

import 'screens/history/history_screen.dart';

final Map<String, WidgetBuilder> routes = {
  SplashScreen.routeName: (context) => SplashScreen(),
  SignInScreen.routeName: (context) => SignInScreen(),
  ForgotPasswordScreen.routeName: (context) => ForgotPasswordScreen(),
  LoginSuccessScreen.routeName: (context) => LoginSuccessScreen(),
  HomeScreen.routeName: (context) => HomeScreen(),
  DetailsScreen.routeName: (context) => DetailsScreen(),
  CartScreen.routeName: (context) => CartScreen(),
  ProfileScreen.routeName: (context) => ProfileScreen(),
  AllPro.routeName: (context) => AllPro(),
  AllPro1.routeName: (context) => AllPro1(),
  Search.routeName: (context) => Search(),
  ProfileDetail.routeName: (context) => ProfileDetail(),
  BillScreen.routeName: (context) => BillScreen(),
  HistoryScreen.routeName: (context) => HistoryScreen(),
};
