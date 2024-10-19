import '/auth/firebase_auth/auth_util.dart';
import '/backend/backend.dart';
import '/flutter_flow/flutter_flow_icon_button.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import '/flutter_flow/flutter_flow_util.dart';
import '/flutter_flow/flutter_flow_widgets.dart';
import 'dart:async';
import 'auth_create_widget.dart' show AuthCreateWidget;
import 'package:smooth_page_indicator/smooth_page_indicator.dart'
    as smooth_page_indicator;
import 'package:flutter/material.dart';
import 'package:flutter_keyboard_visibility/flutter_keyboard_visibility.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:mask_text_input_formatter/mask_text_input_formatter.dart';
import 'package:provider/provider.dart';

class AuthCreateModel extends FlutterFlowModel<AuthCreateWidget> {
  ///  State fields for stateful widgets in this page.

  // State field(s) for PageView widget.
  PageController? pageViewController;

  int get pageViewCurrentIndex => pageViewController != null &&
          pageViewController!.hasClients &&
          pageViewController!.page != null
      ? pageViewController!.page!.round()
      : 0;
  // State field(s) for displayName widget.
  FocusNode? displayNameFocusNode;
  TextEditingController? displayNameTextController;
  String? Function(BuildContext, String?)? displayNameTextControllerValidator;
  // State field(s) for emailAddress widget.
  FocusNode? emailAddressFocusNode;
  TextEditingController? emailAddressTextController;
  String? Function(BuildContext, String?)? emailAddressTextControllerValidator;
  // State field(s) for phoneNumber widget.
  FocusNode? phoneNumberFocusNode;
  TextEditingController? phoneNumberTextController;
  String? Function(BuildContext, String?)? phoneNumberTextControllerValidator;
  // State field(s) for birthDate widget.
  FocusNode? birthDateFocusNode;
  TextEditingController? birthDateTextController;
  final birthDateMask = MaskTextInputFormatter(mask: '##/##/####');
  String? Function(BuildContext, String?)? birthDateTextControllerValidator;
  // State field(s) for gender widget.
  FocusNode? genderFocusNode;
  TextEditingController? genderTextController;
  String? Function(BuildContext, String?)? genderTextControllerValidator;
  // State field(s) for password widget.
  FocusNode? passwordFocusNode;
  TextEditingController? passwordTextController;
  late bool passwordVisibility;
  String? Function(BuildContext, String?)? passwordTextControllerValidator;
  // State field(s) for confirmPassword widget.
  FocusNode? confirmPasswordFocusNode;
  TextEditingController? confirmPasswordTextController;
  late bool confirmPasswordVisibility;
  String? Function(BuildContext, String?)?
      confirmPasswordTextControllerValidator;
  // State field(s) for specialization widget.
  FocusNode? specializationFocusNode;
  TextEditingController? specializationTextController;
  String? Function(BuildContext, String?)?
      specializationTextControllerValidator;
  // State field(s) for yearExperience widget.
  FocusNode? yearExperienceFocusNode;
  TextEditingController? yearExperienceTextController;
  String? Function(BuildContext, String?)?
      yearExperienceTextControllerValidator;
  // State field(s) for education widget.
  FocusNode? educationFocusNode;
  TextEditingController? educationTextController;
  String? Function(BuildContext, String?)? educationTextControllerValidator;
  // State field(s) for charges widget.
  FocusNode? chargesFocusNode;
  TextEditingController? chargesTextController;
  String? Function(BuildContext, String?)? chargesTextControllerValidator;
  // State field(s) for aadharNumber widget.
  FocusNode? aadharNumberFocusNode;
  TextEditingController? aadharNumberTextController;
  String? Function(BuildContext, String?)? aadharNumberTextControllerValidator;
  // State field(s) for licenseNumber widget.
  FocusNode? licenseNumberFocusNode;
  TextEditingController? licenseNumberTextController;
  String? Function(BuildContext, String?)? licenseNumberTextControllerValidator;

  @override
  void initState(BuildContext context) {
    passwordVisibility = false;
    confirmPasswordVisibility = false;
  }

  @override
  void dispose() {
    displayNameFocusNode?.dispose();
    displayNameTextController?.dispose();

    emailAddressFocusNode?.dispose();
    emailAddressTextController?.dispose();

    phoneNumberFocusNode?.dispose();
    phoneNumberTextController?.dispose();

    birthDateFocusNode?.dispose();
    birthDateTextController?.dispose();

    genderFocusNode?.dispose();
    genderTextController?.dispose();

    passwordFocusNode?.dispose();
    passwordTextController?.dispose();

    confirmPasswordFocusNode?.dispose();
    confirmPasswordTextController?.dispose();

    specializationFocusNode?.dispose();
    specializationTextController?.dispose();

    yearExperienceFocusNode?.dispose();
    yearExperienceTextController?.dispose();

    educationFocusNode?.dispose();
    educationTextController?.dispose();

    chargesFocusNode?.dispose();
    chargesTextController?.dispose();

    aadharNumberFocusNode?.dispose();
    aadharNumberTextController?.dispose();

    licenseNumberFocusNode?.dispose();
    licenseNumberTextController?.dispose();
  }
}
