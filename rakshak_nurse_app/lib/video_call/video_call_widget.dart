import '/auth/firebase_auth/auth_util.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import '/flutter_flow/flutter_flow_util.dart';
import '/flutter_flow/flutter_flow_widgets.dart';
import '/custom_code/widgets/index.dart' as custom_widgets;
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:provider/provider.dart';
import 'video_call_model.dart';
export 'video_call_model.dart';

class VideoCallWidget extends StatefulWidget {
  const VideoCallWidget({
    super.key,
    required this.groupId,
  });

  final String? groupId;

  @override
  State<VideoCallWidget> createState() => _VideoCallWidgetState();
}

class _VideoCallWidgetState extends State<VideoCallWidget> {
  late VideoCallModel _model;

  final scaffoldKey = GlobalKey<ScaffoldState>();

  @override
  void initState() {
    super.initState();
    _model = createModel(context, () => VideoCallModel());
  }

  @override
  void dispose() {
    _model.dispose();

    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () => FocusScope.of(context).unfocus(),
      child: Scaffold(
        key: scaffoldKey,
        backgroundColor: FlutterFlowTheme.of(context).primaryBackground,
        body: SafeArea(
          top: true,
          child: Column(
            mainAxisSize: MainAxisSize.max,
            children: [
              AuthUserStreamWidget(
                builder: (context) => Container(
                  width: double.infinity,
                  height: 800.0,
                  child: custom_widgets.VideoCall(
                    width: double.infinity,
                    height: 800.0,
                    userID: currentUserUid,
                    userName: currentUserDisplayName,
                    groupID: widget!.groupId!,
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
