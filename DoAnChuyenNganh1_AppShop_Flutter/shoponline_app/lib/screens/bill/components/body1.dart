import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';

import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:http/http.dart' as http;

import 'bill_item_card.dart';

List<User> user = [];

class Body1 extends StatefulWidget {
  final List<Cart1> items;

  const Body1({Key? key, required this.items}) : super(key: key);
  @override
  State<Body1> createState() => _BodyState(items);
}

class _BodyState extends State<Body1> {
  final List<Cart1> items;

  _BodyState(this.items);
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding:
          EdgeInsets.symmetric(horizontal: getProportionateScreenWidth(20)),
      child: ListView.builder(
        itemCount: items.length,
        itemBuilder: (context, index) => Padding(
          padding: EdgeInsets.symmetric(vertical: 10),
          child: BillItemCard(
            cart: items[index],
          ),
        ),
      ),
    );
  }
}
