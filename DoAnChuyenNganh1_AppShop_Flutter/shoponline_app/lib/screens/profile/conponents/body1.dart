import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/profile/conponents/detail_profile.dart';
import 'package:shoponline_app/size_config.dart';

import 'profile_menu.dart';
import 'profile_pic.dart';

class Body1 extends StatelessWidget {
  final Future<List<User>> products;

  const Body1({Key? key, required this.products}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              ProfilePic(
                products: products,
              ),
              SizedBox(height: 10),
              Text(
                "Hồ Văn Đoan",
                style: TextStyle(
                  color: Colors.black,
                  fontSize: getProportionateScreenHeight(25),
                  fontWeight: FontWeight.w600,
                ),
              ),
              SizedBox(height: 100),
            ],
          ),
        ),
        Information1(),
      ],
    );
  }
}

class Information1 extends StatelessWidget {
  const Information1({
    Key? key,
  }) : super(key: key);
  static List sdt = ["Số điện thoại: ", "Địa chỉ: ", "Email: "];

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Center(
          child: FutureBuilder<List<User>>(
            future: products,
            builder: (context, snapshot) {
              if (snapshot.hasError) print(snapshot.error);

              return snapshot.hasData
                  ? Xuli(
                      sdt: snapshot.data![0].phone,
                      email: snapshot.data![0].username,
                      diachi: snapshot.data![0].address)
                  :

                  // return the ListView widget :
                  Center(child: CircularProgressIndicator());
            },
          ),
        )
      ],
    );
  }
}

class Xuli extends StatelessWidget {
  const Xuli(
      {Key? key, required this.sdt, required this.email, required this.diachi})
      : super(key: key);
  final String sdt, email, diachi;
  static List infor = ["Số điện thoại: ", "Địa chỉ: ", "Email: "];
  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Information(
          text1: infor[0],
          text2: sdt,
        ),
        Information(
          text1: infor[1],
          text2: email,
        ),
        Information(
          text1: infor[2],
          text2: diachi,
        )
      ],
    );
  }
}

class Information extends StatelessWidget {
  const Information({
    Key? key,
    required this.text1,
    required this.text2,
  }) : super(key: key);
  final String text1, text2;

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        Padding(
          padding: const EdgeInsets.all(8.0),
          child: Align(
            alignment: Alignment.centerLeft,
            child: Container(
              child: Row(
                children: [
                  Text(
                    text1,
                    style: TextStyle(
                      color: Colors.amber[800],
                      fontWeight: FontWeight.bold,
                      fontSize: getProportionateScreenWidth(20),
                    ),
                  ),
                  Flexible(
                    child: Text(
                      text2,
                      maxLines: 10,
                      style: TextStyle(
                        color: Colors.black,
                        fontWeight: FontWeight.bold,
                        fontSize: getProportionateScreenWidth(20),
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ),
        ),
      ],
    );
  }
}
