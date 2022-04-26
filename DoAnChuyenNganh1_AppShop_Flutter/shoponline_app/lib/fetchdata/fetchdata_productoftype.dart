import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/models/link.dart';

List<Product> parseProductofType(String responseBody) {
  final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();
  return parsed.map<Product>((json) => Product.fromMap(json)).toList();
}

Future<List<Product>> fetchProductofType(int a) async {
  final response = await http.get(Uri.parse(link[8] + "$a"));
  if (response.statusCode == 200 || response.body != []) {
    return parseProductofType(response.body);
  } else {
    throw Exception('Unable to fetch products from the REST API');
  }
}
