import 'package:flutter/material.dart';
import 'package:shoponline_app/constant.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/size_config.dart';
import 'package:shoponline_app/models/link.dart';

class ProductImages extends StatefulWidget {
  const ProductImages({
    Key? key,
    required this.product,
  }) : super(key: key);

  final Product product;

  @override
  State<ProductImages> createState() => _ProductImagesState();
}

class _ProductImagesState extends State<ProductImages> {
  int selectedImage = 0;

  @override
  Widget build(BuildContext context) {
    List a = [
      widget.product.img1,
      widget.product.img2,
      widget.product.img3,
    ];
    return Column(
      children: [
        SizedBox(
          width: getProportionateScreenWidth(238),
          child: AspectRatio(
            aspectRatio: 1,
            child: Image.network(link[3] + "${a[selectedImage]}"),
          ),
        ),
        Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            ...List.generate(a.length, (index) => buildSmallPreview(index, a)),
          ],
        ),
      ],
    );
  }

  GestureDetector buildSmallPreview(int index, List a) {
    return GestureDetector(
      onTap: () {
        setState(() {
          selectedImage = index;
        });
      },
      child: Container(
        margin: EdgeInsets.only(right: getProportionateScreenWidth(15)),
        padding: EdgeInsets.all(getProportionateScreenHeight(8)),
        height: getProportionateScreenWidth(48),
        width: getProportionateScreenWidth(48),
        decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(10),
            border: Border.all(
                color: selectedImage == index
                    ? kPrimaryColor
                    : Colors.transparent)),
        child: Image.network(link[3] + a[index]),
      ),
    );
  }
}
