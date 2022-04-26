import 'package:flutter/material.dart';
import 'package:shoponline_app/size_config.dart';

class TopRounderContainer extends StatelessWidget {
  const TopRounderContainer({
    Key? key,
    required this.color,
    required this.child,
  }) : super(key: key);
  final Color color;
  final Widget child;

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.only(top: getProportionateScreenWidth(10)),
      padding: EdgeInsets.only(
          top: getProportionateScreenWidth(5),
          bottom: getProportionateScreenWidth(15)),
      width: double.infinity,
      decoration: BoxDecoration(
        color: color,
        borderRadius: BorderRadius.only(
          topLeft: Radius.circular(40),
          topRight: Radius.circular(40),
        ),
      ),
      child: child,
    );
  }
}
