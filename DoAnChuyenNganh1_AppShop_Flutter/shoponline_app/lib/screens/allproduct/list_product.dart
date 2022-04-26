import 'package:flutter/material.dart';
import 'package:shoponline_app/models/products.dart';

import 'all_product.dart';

class ProductBoxList extends StatelessWidget {
  final List<Product> items;
  ProductBoxList({Key? key, required this.items});

  @override
  Widget build(BuildContext context) {
    return GridView.count(
        crossAxisCount: 2,
        childAspectRatio: 1.7 / 2,
        children: List.generate(items.length, (index) {
          return AllProduct(
            products: items,
            index: index,
          );
        }));
  }
}
