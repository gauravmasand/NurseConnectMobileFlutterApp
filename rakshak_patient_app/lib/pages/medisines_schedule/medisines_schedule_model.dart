import '/auth/firebase_auth/auth_util.dart';
import '/backend/backend.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import '/flutter_flow/flutter_flow_util.dart';
import '/flutter_flow/flutter_flow_widgets.dart';
import 'medisines_schedule_widget.dart' show MedisinesScheduleWidget;
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:provider/provider.dart';

class MedisinesScheduleModel extends FlutterFlowModel<MedisinesScheduleWidget> {
  ///  State fields for stateful widgets in this page.

  // State field(s) for morning widget.
  FocusNode? morningFocusNode;
  TextEditingController? morningTextController;
  String? Function(BuildContext, String?)? morningTextControllerValidator;
  // State field(s) for afternoon widget.
  FocusNode? afternoonFocusNode;
  TextEditingController? afternoonTextController;
  String? Function(BuildContext, String?)? afternoonTextControllerValidator;
  // State field(s) for night widget.
  FocusNode? nightFocusNode;
  TextEditingController? nightTextController;
  String? Function(BuildContext, String?)? nightTextControllerValidator;

  @override
  void initState(BuildContext context) {}

  @override
  void dispose() {
    morningFocusNode?.dispose();
    morningTextController?.dispose();

    afternoonFocusNode?.dispose();
    afternoonTextController?.dispose();

    nightFocusNode?.dispose();
    nightTextController?.dispose();
  }
}
