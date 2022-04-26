import 'package:flutter/material.dart';
import 'package:shoponline_app/fetchdata/fetchdata_productoftype.dart';
import 'package:shoponline_app/models/link.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/models/slide.dart';
import 'package:shoponline_app/screens/allproduct/all_pro1.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:shoponline_app/fetchdata/fetchdata_slide.dart';
import 'section_title.dart';

class SpecialOffers extends StatelessWidget {
  final Future<List<Slide>> products;
  const SpecialOffers({
    Key? key,
    required this.products,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        SizedBox(
          height: getProportionateScreenWidth(15),
        ),
        SingleChildScrollView(
          scrollDirection: Axis.horizontal,
          child: FutureBuilder<List<Slide>>(
            future: products,
            builder: (context, snapshot) {
              if (snapshot.hasError) print(snapshot.error);
              //print(snapshot.data![0].);
              return snapshot.hasData
                  ? Row(
                      children: [
                        ...List.generate(snapshot.data!.length, (index) {
                          return SpecialOfferCard(
                            category: snapshot.data![index].name,
                            image: link[4] + "${snapshot.data![index].img}",
                            numOfBrands: 24,
                            products1:
                                fetchProductofType(snapshot.data![index].id),
                            press: () => Navigator.pushNamed(
                                context, AllPro1.routeName,
                                arguments: ProductDetailsArguments1(
                                    products: fetchProductofType(
                                        snapshot.data![index].id))),
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

class SpecialOfferCard extends StatelessWidget {
  SpecialOfferCard({
    Key? key,
    required this.category,
    required this.image,
    required this.numOfBrands,
    required this.press,
    required this.products1,
  }) : super(key: key);

  final String category, image;
  final int numOfBrands;
  final GestureTapCallback press;
  Future<List<Product>> products1;
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: EdgeInsets.only(
        left: getProportionateScreenWidth(20),
      ),
      child: GestureDetector(
        onTap: press,
        child: SizedBox(
          width: getProportionateScreenWidth(340),
          height: getProportionateScreenHeight(170),
          child: ClipRRect(
            borderRadius: BorderRadius.circular(20),
            child: Stack(
              children: [
                Container(
                  decoration: BoxDecoration(
                    image: DecorationImage(
                      image: Image.network(image).image,
                      fit: BoxFit.cover,
                    ),
                  ),
                ),
                Container(
                  decoration: BoxDecoration(
                    gradient: LinearGradient(
                      begin: Alignment.topCenter,
                      end: Alignment.bottomCenter,
                      colors: [
                        Color(0xFF343434).withOpacity(0.4),
                        Color(0xFF343434).withOpacity(0.15),
                      ],
                    ),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.symmetric(
                    horizontal: getProportionateScreenWidth(15),
                    vertical: getProportionateScreenWidth(10),
                  ),
                  child: Text.rich(
                    TextSpan(
                      style: TextStyle(color: Colors.white),
                      children: [
                        TextSpan(
                          text: "$category\n",
                          style: TextStyle(
                            fontSize: getProportionateScreenWidth(18),
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                        TextSpan(text: "$numOfBrands Brands"),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
