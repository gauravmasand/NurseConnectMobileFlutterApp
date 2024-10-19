// Automatic FlutterFlow imports
import '/backend/backend.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import '/flutter_flow/flutter_flow_util.dart';
import 'index.dart'; // Imports other custom widgets
import '/flutter_flow/custom_functions.dart'; // Imports custom functions
import 'package:flutter/material.dart';
// Begin custom widget code
// DO NOT REMOVE OR MODIFY THE CODE ABOVE!

// Set your widget name, define your parameter, and then add the
// boilerplate code using the green button on the right!

class VideoCall extends StatefulWidget {
  const VideoCall(
      {super.key,
      required this.width,
      required this.height,
      required this.userID,
      required this.userName,
      required this.groupID});

  final double width;
  final double height;
  final String userID;
  final String userName;
  final String groupID;

  @override
  State<VideoCall> createState() => _VideoCallState();
}

class _VideoCallState extends State<VideoCall> {
  @override
  Widget build(BuildContext context) {
// return ZegoUIKitPrebuiltCall(
//       appID:
//           "1565694630", // Fill in the appID that you get from ZEGOCLOUD Admin Console.
//       appSign:
//           "4744f1f7c83f59258c99822030821197e75fce827ac6edcb2129c46156e6a5d8", // Fill in the appSign that you get from ZEGOCLOUD Admin Console.
//       userID: widget.userID,
//       userName: widget.userName,
//       callID: widget.callID,
//       // You can also use groupVideo/groupVoice/oneOnOneVoice to make more types of calls.
//       config: ZegoUIKitPrebuiltCallConfig.oneOnOneVideoCall(),
//     );

    return Container();
  }
}
