import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';

import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/sign_in/components/sign_form.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:http/http.dart' as http;
import 'cart_item.card.dart';

List<User> user = [];

class Body extends StatefulWidget {
  final List<Cart1> items;

  const Body({Key? key, required this.items}) : super(key: key);
  @override
  State<Body> createState() => _BodyState(items);
}

class _BodyState extends State<Body> {
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
          child: Dismissible(
            key: Key(items[index].id.toString()),
            direction: DismissDirection.endToStart,
            background: Container(
              padding: EdgeInsets.symmetric(horizontal: 20),
              decoration: BoxDecoration(
                  color: Color(0xFFFFE6E6),
                  borderRadius: BorderRadius.circular(15)),
              child: Row(
                children: [
                  Spacer(),
                  SvgPicture.asset("assets/icons/Trash.svg")
                ],
              ),
            ),
            onDismissed: (direction) {
              myDelete(context, items[index].id);
            },
            child: CartItemCard(
              cart: items[index],
            ),
          ),
        ),
      ),
    );
  }
}

void myDelete(context, int b) async {
  String a, e;
  e = SignForm.password1.text;

  a = SignForm.username.text;
  //djtconmeno.email = email;
  //djtconmeno.password = password;
  user = await fetchProducts(a, e);

  final response = await http.get(Uri.parse(
      "http://192.168.1.5/doanchuyennganh/public/api/cartdelete/" +
          "${user[0].id}" +
          "/$b"));
  print("http://192.168.1.5/doanchuyennganh/public/api/cartdelete/" +
      "${user[0].id}" +
      "/$b");
  return _showToast(context);
}

void _showToast(BuildContext context) {
  final scaffold = ScaffoldMessenger.of(context);
  scaffold.showSnackBar(
    SnackBar(
      content: const Text('Xóa thành công'),
    ),
  );
}
