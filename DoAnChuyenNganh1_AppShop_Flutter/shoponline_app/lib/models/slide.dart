import 'package:flutter/material.dart';

class Slide {
  final int id;
  final String name;
  final String img;

  Slide(this.id, this.name, this.img);

  factory Slide.fromMap(Map<String, dynamic> json) {
    return Slide(
      json['id'],
      json['name'],
      json['img'],
    );
  }
}
