// Automatic FlutterFlow imports
import 'package:url_launcher/url_launcher.dart';

import '/backend/backend.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import '/flutter_flow/flutter_flow_util.dart';
import 'index.dart'; // Imports other custom widgets
import 'package:flutter/material.dart';
// Begin custom widget code
// DO NOT REMOVE OR MODIFY THE CODE ABOVE!


class VideoCall extends StatefulWidget {
  const VideoCall(
      {super.key,
      this.width,
      this.height,
      required this.userID,
      required this.userName,
      required this.callID});

  final double? width;
  final double? height;
  final String? userID;
  final String? userName;
  final String? callID;

  @override
  State<VideoCall> createState() => _VideoCallState();
}

class _VideoCallState extends State<VideoCall> {
  @override
  Widget build(BuildContext context) {
    return WhatsAppCallScreen();
  }
}


class WhatsAppCallScreen extends StatefulWidget {
  @override
  _WhatsAppCallScreenState createState() => _WhatsAppCallScreenState();
}

class _WhatsAppCallScreenState extends State<WhatsAppCallScreen> {

  // Function to launch WhatsApp with a phone number
  Future<void> _launchWhatsApp({required String phone}) async {
    // final whatsappUrl = "https://wa.me/91876543210";
    //
    // if (await canLaunch(whatsappUrl)) {
    //   await launch(whatsappUrl);
    // } else {
    //   throw 'Could not launch WhatsApp';
    // }

    final Uri url = Uri.parse('https://wa.me/91$phone');
    if (!await launchUrl(url)) {
      throw Exception('Could not launch $url');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('WhatsApp Call Integration'),
      ),
      body: Center(
        child: ElevatedButton(
          onPressed: () {
            // Replace the number with the one you want to call
            _launchWhatsApp(phone: "919876543210"); // Example number
          },
          child: Text("Open WhatsApp Call"),
        ),
      ),
    );
  }
}