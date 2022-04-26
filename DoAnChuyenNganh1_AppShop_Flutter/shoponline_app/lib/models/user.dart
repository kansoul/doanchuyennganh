import 'package:flutter/material.dart';

class User {
  final int id;
  final String name;
  final String img;
  final String phone;
  final String address;
  final String username;
  final String password;
  final String mkh;

  User(
    this.id,
    this.name,
    this.img,
    this.phone,
    this.address,
    this.username,
    this.password,
    this.mkh,
  );

  factory User.fromMap(Map<String, dynamic> json) {
    return User(
      json['id'],
      json['name'],
      json['img'],
      json['phone'],
      json['address'],
      json['username'],
      json['password'],
      json['mkh'],
    );
  }
}
