import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shoponline_app/models/link.dart';
import 'package:shoponline_app/models/user.dart';

List<User> parseProducts(String responseBody) {
  final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();
  return parsed.map<User>((json) => User.fromMap(json)).toList();
}

Future<List<User>> fetchProducts(String a, b) async {
  final response = await http.get(Uri.parse(link[2] + a + '/' + b));
  if (response.statusCode == 200 || response.body != []) {
    return parseProducts(response.body);
  } else {
    throw Exception('Unable to fetch products from the REST API');
  }
}
