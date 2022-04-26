import 'package:flutter/material.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/fetchdata/fetchdata_search.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/allproduct/all_product.dart';
import 'package:shoponline_app/screens/allproduct/list_product.dart';
import 'package:shoponline_app/screens/allproduct/search_product.dart';
import 'package:shoponline_app/size_config.dart';

List<Product> search = [];

class SearchField extends StatelessWidget {
  const SearchField({
    Key? key,
  }) : super(key: key);
  static TextEditingController search1 = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Container(
      width: SizeConfig.screenWidth * 0.6,
      height: 50,
      decoration: BoxDecoration(
        color: kSecondaryColor.withOpacity(0.1),
        borderRadius: BorderRadius.circular(15),
      ),
      child: TextField(
        onChanged: (value) {
          //search value
        },
        controller: search1,
        decoration: InputDecoration(
          enabledBorder: InputBorder.none,
          focusedBorder: InputBorder.none,
          hintText: "Tìm sản phẩm",
          suffixIcon: IconButton(
            onPressed: () => Navigator.pushNamed(
              context,
              Search.routeName,
            ),
            icon: Icon(Icons.search),
          ),
          contentPadding: EdgeInsets.symmetric(
            horizontal: getProportionateScreenWidth(20),
            vertical: getProportionateScreenWidth(9),
          ),
        ),
      ),
    );
  }
}
