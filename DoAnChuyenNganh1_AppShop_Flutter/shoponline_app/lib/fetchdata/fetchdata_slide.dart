import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shoponline_app/models/link.dart';
import 'package:shoponline_app/models/slide.dart';

List<Slide> parseSlide(String responseBody) {
  final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();
  return parsed.map<Slide>((json) => Slide.fromMap(json)).toList();
}

Future<List<Slide>> fetchSlide() async {
  final response = await http.get(Uri.parse(link[1]));
  if (response.statusCode == 200 || response.body != []) {
    return parseSlide(response.body);
  } else {
    throw Exception('Unable to fetch products from the REST API');
  }
}
