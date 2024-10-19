import '/auth/firebase_auth/auth_util.dart';
import '/flutter_flow/flutter_flow_icon_button.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import '/flutter_flow/flutter_flow_util.dart';
import '/flutter_flow/flutter_flow_widgets.dart';
import 'auth_create_widget.dart' show AuthCreateWidget;
import 'package:smooth_page_indicator/smooth_page_indicator.dart'
    as smooth_page_indicator;
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
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
  // State field(s) for phoneNumber widget.
  FocusNode? phoneNumberFocusNode;
  TextEditingController? phoneNumberTextController;
  String? Function(BuildContext, String?)? phoneNumberTextControllerValidator;
  // State field(s) for emailAddress widget.
  FocusNode? emailAddressFocusNode;
  TextEditingController? emailAddressTextController;
  String? Function(BuildContext, String?)? emailAddressTextControllerValidator;
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
  // State field(s) for gender widget.
  FocusNode? genderFocusNode;
  TextEditingController? genderTextController;
  String? Function(BuildContext, String?)? genderTextControllerValidator;
  // State field(s) for age widget.
  FocusNode? ageFocusNode;
  TextEditingController? ageTextController;
  String? Function(BuildContext, String?)? ageTextControllerValidator;
  // State field(s) for bloodGroup widget.
  FocusNode? bloodGroupFocusNode;
  TextEditingController? bloodGroupTextController;
  String? Function(BuildContext, String?)? bloodGroupTextControllerValidator;
  // State field(s) for address widget.
  FocusNode? addressFocusNode;
  TextEditingController? addressTextController;
  String? Function(BuildContext, String?)? addressTextControllerValidator;
  // State field(s) for specialMedicalCondition widget.
  FocusNode? specialMedicalConditionFocusNode;
  TextEditingController? specialMedicalConditionTextController;
  String? Function(BuildContext, String?)?
      specialMedicalConditionTextControllerValidator;
  // State field(s) for medicalHistory widget.
  FocusNode? medicalHistoryFocusNode;
  TextEditingController? medicalHistoryTextController;
  String? Function(BuildContext, String?)?
      medicalHistoryTextControllerValidator;
  // State field(s) for regularMedicines widget.
  FocusNode? regularMedicinesFocusNode;
  TextEditingController? regularMedicinesTextController;
  String? Function(BuildContext, String?)?
      regularMedicinesTextControllerValidator;
  // State field(s) for doctorName widget.
  FocusNode? doctorNameFocusNode;
  TextEditingController? doctorNameTextController;
  String? Function(BuildContext, String?)? doctorNameTextControllerValidator;
  // State field(s) for doctorContact widget.
  FocusNode? doctorContactFocusNode;
  TextEditingController? doctorContactTextController;
  String? Function(BuildContext, String?)? doctorContactTextControllerValidator;
  // State field(s) for mobilityStatus widget.
  FocusNode? mobilityStatusFocusNode;
  TextEditingController? mobilityStatusTextController;
  String? Function(BuildContext, String?)?
      mobilityStatusTextControllerValidator;
  // State field(s) for preferredNurseGender widget.
  FocusNode? preferredNurseGenderFocusNode;
  TextEditingController? preferredNurseGenderTextController;
  String? Function(BuildContext, String?)?
      preferredNurseGenderTextControllerValidator;
  // State field(s) for criticalCondition widget.
  bool? criticalConditionValue;
  // State field(s) for Diabetes widget.
  bool? diabetesValue;
  // State field(s) for Hypertension widget.
  bool? hypertensionValue;
  // State field(s) for shortDescription widget.
  FocusNode? shortDescriptionFocusNode;
  TextEditingController? shortDescriptionTextController;
  String? Function(BuildContext, String?)?
      shortDescriptionTextControllerValidator;

  @override
  void initState(BuildContext context) {
    passwordVisibility = false;
    confirmPasswordVisibility = false;
  }

  @override
  void dispose() {
    displayNameFocusNode?.dispose();
    displayNameTextController?.dispose();

    phoneNumberFocusNode?.dispose();
    phoneNumberTextController?.dispose();

    emailAddressFocusNode?.dispose();
    emailAddressTextController?.dispose();

    passwordFocusNode?.dispose();
    passwordTextController?.dispose();

    confirmPasswordFocusNode?.dispose();
    confirmPasswordTextController?.dispose();

    genderFocusNode?.dispose();
    genderTextController?.dispose();

    ageFocusNode?.dispose();
    ageTextController?.dispose();

    bloodGroupFocusNode?.dispose();
    bloodGroupTextController?.dispose();

    addressFocusNode?.dispose();
    addressTextController?.dispose();

    specialMedicalConditionFocusNode?.dispose();
    specialMedicalConditionTextController?.dispose();

    medicalHistoryFocusNode?.dispose();
    medicalHistoryTextController?.dispose();

    regularMedicinesFocusNode?.dispose();
    regularMedicinesTextController?.dispose();

    doctorNameFocusNode?.dispose();
    doctorNameTextController?.dispose();

    doctorContactFocusNode?.dispose();
    doctorContactTextController?.dispose();

    mobilityStatusFocusNode?.dispose();
    mobilityStatusTextController?.dispose();

    preferredNurseGenderFocusNode?.dispose();
    preferredNurseGenderTextController?.dispose();

    shortDescriptionFocusNode?.dispose();
    shortDescriptionTextController?.dispose();
  }
}
