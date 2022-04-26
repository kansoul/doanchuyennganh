import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shoponline_app/models/cart1.dart';
import 'package:shoponline_app/models/products.dart';
import 'package:shoponline_app/models/link.dart';

List<Cart1> parseHistory(String responseBody) {
  final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();
  return parsed.map<Cart1>((json) => Cart1.fromMap(json)).toList();
}

Future<List<Cart1>> fetchHistory(String a) async {
  final response = await http.get(Uri.parse(link[12] + a));
  if (response.statusCode == 200 || response.body != []) {
    return parseHistory(response.body);
  } else {
    throw Exception('Unable to fetch products from the REST API');
  }
}
