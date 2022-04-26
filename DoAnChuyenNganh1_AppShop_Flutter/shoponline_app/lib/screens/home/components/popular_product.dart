import 'package:flutter/material.dart';
import 'package:shoponline_app/fetchdata/fetchdata_product.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/screens/allproduct/all_pro.dart';
import 'package:shoponline_app/screens/details/details_screen.dart';
import 'package:shoponline_app/size_config.dart';

import 'product_card.dart';
import 'section_title.dart';

class PopularProducts extends StatelessWidget {
  const PopularProducts({
    Key? key,
    required this.products,
  }) : super(key: key);
  final Future<List<Product>> products;
  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        SectionTitle(
          text: "Sản phẩm",
          press: () => Navigator.pushNamed(
            context,
            AllPro.routeName,
          ),
        ),
        SizedBox(
          height: getProportionateScreenWidth(20),
        ),
        SingleChildScrollView(
          scrollDirection: Axis.horizontal,
          child: FutureBuilder<List<Product>>(
            future: products,
            builder: (context, snapshot) {
              if (snapshot.hasError) print(snapshot.error);
              //print(snapshot.data![0].);
              return snapshot.hasData
                  ? Row(
                      children: [
                        ...List.generate(snapshot.data!.length, (index) {
                          return ProductCard(
                            product: snapshot.data![index],
                            press: () => Navigator.pushNamed(
                                context, DetailsScreen.routeName,
                                arguments: ProductDetailsArguments(
                                    product: snapshot.data![index])),
                          );
                        })
                      ],
                    )
                  :

                  // return the ListView widget :
                  Center(child: CircularProgressIndicator());
            },
          ),
        ),
      ],
    );
  }
}
