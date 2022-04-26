import 'package:flutter/material.dart';
import 'package:shoponline_app/components/custom_surfix_icon.dart';
import 'package:shoponline_app/components/default_button.dart';
import 'package:shoponline_app/components/form_error.dart';
import 'package:shoponline_app/fetchdata/fetchdata_user.dart';
import 'package:shoponline_app/models/user.dart';
import 'package:shoponline_app/screens/forgot_passowrd/forgot_passoword_screen.dart';
import 'package:shoponline_app/screens/home/home_screen.dart';
import 'package:shoponline_app/screens/login_success/login_success_screen.dart';

import '../../../constant.dart';
import '../../../size_config.dart';

List<User> user = [];

class SignForm extends StatefulWidget {
  @override
  _SignFormState createState() => _SignFormState();
  static TextEditingController username = TextEditingController();
  static TextEditingController password1 = TextEditingController();
}

class _SignFormState extends State<SignForm> {
  final _formKey = GlobalKey<FormState>();
  late String email;
  late String password;
  late bool remember = false;
  static List<String> errors = [];

  @override
  Widget build(BuildContext context) {
    return Form(
      key: _formKey,
      child: Column(
        children: [
          buildEmailFormField(),
          SizedBox(
            height: getProportionateScreenHeight(30),
          ),
          buildPasswordFormField(),
          SizedBox(
            height: getProportionateScreenHeight(30),
          ),
          SizedBox(
            height: getProportionateScreenHeight(20),
          ),
          Row(
            children: [
              Checkbox(
                value: remember,
                activeColor: kPrimaryColor,
                onChanged: (value) {
                  setState(() {
                    remember = value!;
                  });
                },
              ),
              Text("Remember me"),
              Spacer(),
              GestureDetector(
                onTap: () => Navigator.popAndPushNamed(
                    context, ForgotPasswordScreen.routeName),
                child: Text(
                  "Forgot Password",
                  style: TextStyle(
                    decoration: TextDecoration.underline,
                  ),
                ),
              )
            ],
          ),
          SizedBox(
            height: getProportionateScreenHeight(20),
          ),
          FormError(errors: errors),
          DefaultButton(
            text: "Login",
            press: () {
              if (_formKey.currentState!.validate()) {
                _formKey.currentState!.save();
                myFunction(context);
              }
            },
          ),
        ],
      ),
    );
  }

  TextFormField buildPasswordFormField() {
    return TextFormField(
      controller: SignForm.password1,
      obscureText: true,
      onSaved: (newValue) => password = newValue!,
      onChanged: (value) {
        if (value.isNotEmpty && errors.contains(kPassNullError)) {
          setState(() {
            errors.remove(kPassNullError);
          });
        } else if (value.length >= 8 && errors.contains(kShortPassError)) {
          setState(() {
            errors.remove(kShortPassError);
          });
        }
        return null;
      },
      validator: (value) {
        if (value!.isEmpty && !errors.contains(kPassNullError)) {
          setState(() {
            errors.add(kPassNullError);
          });
          return "";
        } else if (value.length < 8 && !errors.contains(kShortPassError)) {
          setState(() {
            errors.add(kShortPassError);
          });
          return "";
        }
        return null;
      },
      decoration: InputDecoration(
          labelText: "Password",
          hintText: "Enter your password",
          floatingLabelBehavior: FloatingLabelBehavior.always,
          suffixIcon: CustomSurffixIcon(
            svgIcon: "assets/icons/Lock.svg",
          )),
    );
  }

  TextFormField buildEmailFormField() {
    return TextFormField(
      controller: SignForm.username,
      keyboardType: TextInputType.emailAddress,
      onSaved: (newValue) => email = newValue!,
      onChanged: (value) {
        if (value.isNotEmpty && errors.contains(kEmailNullError)) {
          setState(() {
            errors.remove(kEmailNullError);
          });
        } else if (emailValidatorRegExp.hasMatch(value) &&
            errors.contains(kInvalidEmailError)) {
          setState(() {
            errors.remove(kInvalidEmailError);
          });
        }
        return null;
      },
      validator: (value) {
        if (value!.isEmpty && !errors.contains(kEmailNullError)) {
          setState(() {
            errors.add(kEmailNullError);
          });
          return "";
        } else if (!emailValidatorRegExp.hasMatch(value) &&
            !errors.contains(kInvalidEmailError)) {
          setState(() {
            errors.add(kInvalidEmailError);
          });
          return "";
        }
        return null;
      },
      decoration: InputDecoration(
          labelText: "Email",
          hintText: "Enter your email",
          floatingLabelBehavior: FloatingLabelBehavior.always,
          suffixIcon: CustomSurffixIcon(
            svgIcon: "assets/icons/Mail.svg",
          )),
    );
  }
}

void myFunction(context) async {
  String a, b;
  b = SignForm.password1.text;

  a = SignForm.username.text;
  //djtconmeno.email = email;
  //djtconmeno.password = password;
  user = await fetchProducts(a, b);

  if (user[0].username == a.toLowerCase() &&
      user[0].password == b.toLowerCase()) {
    Navigator.pushNamed(context, LoginSuccessScreen.routeName);
  } else {
    _showMyDialog(context);
  }
}

Future<void> _showMyDialog(context) async {
  return showDialog<void>(
    context: context,
    barrierDismissible: true, // user must tap button!
    builder: (BuildContext context) {
      return AlertDialog(
        title: const Text(
          'Sai mật khẩu',
          style: TextStyle(color: Colors.red),
        ),
        content: SingleChildScrollView(
          child: ListBody(
            children: const <Widget>[
              Text('Vui lòng nhập lại hoặc liên hệ admin.'),
            ],
          ),
        ),
      );
    },
  );
}
