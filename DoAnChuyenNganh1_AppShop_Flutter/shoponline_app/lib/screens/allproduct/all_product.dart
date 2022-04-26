import 'package:flutter/material.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/details/details_screen.dart';
import 'package:shoponline_app/screens/home/components/product_card.dart';

class AllProduct extends StatelessWidget {
  const AllProduct({
    Key? key,
    required this.products,
    required this.index,
  }) : super(key: key);
  final List<Product> products;
  final int index;
  @override
  Widget build(BuildContext context) {
    return Center(
      child: ProductCard(
        product: products[index],
        press: () => Navigator.pushNamed(context, DetailsScreen.routeName,
            arguments: ProductDetailsArguments(product: products[index])),
      ),
    );
  }
}
