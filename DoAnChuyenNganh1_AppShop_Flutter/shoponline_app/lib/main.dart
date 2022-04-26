// ignore_for_file: deprecated_member_use

import 'dart:ui';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/routs.dart';
import 'package:shoponline_app/screens/home/home_screen.dart';
import 'package:shoponline_app/screens/profile/profile_screen.dart';
import 'package:shoponline_app/screens/splash/splash_screen.dart';

import 'theme.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: theme(),
      //home: SplashScreen(),
      initialRoute: SplashScreen.routeName,
      routes: routes,
    );
  }
}
