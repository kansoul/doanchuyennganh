import 'package:flutter/material.dart';

class Product {
  final int id;
  final int type;
  final int qlt;
  final int price;
  final int isPopular;
  final String title;
  final String img1;
  final String img2;
  final String img3;
  final String description;
  final String msp;

  Product(
    this.id,
    this.title,
    this.img1,
    this.img2,
    this.img3,
    this.type,
    this.qlt,
    this.price,
    this.msp,
    this.description,
    this.isPopular,
  );

  factory Product.fromMap(Map<String, dynamic> json) {
    return Product(
      json['id'],
      json['title'],
      json['img1'],
      json['img2'],
      json['img3'],
      json['type'],
      json['qlt'],
      json['price'],
      json['msp'],
      json['description'],
      json['isPopular'],
    );
  }
}
