import 'package:flutter/material.dart';

class Bill {
  final int id;
  final int id_customer;
  final int id_sp;
  final int qlt;
  final int note;
  final int price;
  final String title;
  final String img1;
  final String name;
  final String mkh;

  Bill(
    this.id,
    this.id_customer,
    this.id_sp,
    this.qlt,
    this.note,
    this.price,
    this.title,
    this.img1,
    this.name,
    this.mkh,
  );

  factory Bill.fromMap(Map<String, dynamic> json) {
    return Bill(
      json['id'],
      json['id_customer'],
      json['id_sp'],
      json['qlt'],
      json['note'],
      json['price'],
      json['title'],
      json['img1'],
      json['name'],
      json['mkh'],
    );
  }
}
